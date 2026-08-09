<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest as ApiAuthRequest;
use App\Http\Responses\Api\ApiResponse;
use App\Http\Requests\Api\{UserRequest};
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\RateLimiter;
use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Support\Facades\{DB, Log};
use Illuminate\Validation\Rules\Password as Pwd;
class AuthController extends Controller
{
    public function __construct()
    {
        // Middleware can be applied here if needed
    }
    public function test(Request $request)
    {
        return ApiResponse::success([
            'mode' => "test"
        ], 'This is testing api');
    }
    public function register(UserRequest $request)
    {
        try {
            DB::beginTransaction();
            
            //$roleId = 5;
            //$role = \Spatie\Permission\Models\Role::findById(id: $roleId, guardName: 'user');
            //$roleName = $role->name;

            //$password = "Password@123456";
            $password = $request->password;
            $user = User::create([
                // 'first_name' => $request->first_name,
                // 'last_name' => $request->last_name,

                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                
                //'role_id' => $roleId,
                //'status' => UserStatus::Active,
            ]);
            // $user->guard_name = 'user';
            // $user->syncRoles([$roleName]);

            //$user->notify(new UserCreatedNotification($user, $password));
            //$this->sendEmailVerification($user, $user->email, 1);

            DB::commit();

            $credentials = array('email' => $request->email, 'password' => $password);
            $token = JWTAuth::attempt($credentials);
            $user = JWTAuth::user();

            $response = $user;

            return ApiResponse::success([
                'token' => $token,
                'profile' => $response->toArray()
            ], __('auth.msg.register_success'));
        }
        catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error : ' . $e->getMessage());
            return ApiResponse::error(__('messages.something_went_wrong'), [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    /**
     * Log in and generate a JWT token.
     */
    public function login(ApiAuthRequest $request)
    {
        // Step 1: Retrieve the credentials from the request
        $credentials = $request->only('email', 'password');
        // Step 2: Implement Rate Limiting
        $key = strtolower($request->input('email')) . '|' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return ApiResponse::error(__('auth.msg.too_many_attempts', ['seconds' => $seconds]), [],  Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $response = [];
        // Step 3: Attempt to create a token for the user
        try {
            $token = JWTAuth::attempt($credentials);
            if (!$token) {
                RateLimiter::hit($key); // Increment attempt count on failure
                return ApiResponse::error(__('auth.msg.invalid_credentials'), [], Response::HTTP_UNAUTHORIZED);
            }
            // Step 4: Retrieve the user details
            $user = JWTAuth::user();
            /* if (!in_array($user->role_id, [5])) {
                // If the user is not a Company (role_id 3) or User (role_id 4), invalidate the token
                if (JWTAuth::setToken($token)->check()) {
                    JWTAuth::invalidate($token);
                }
                return ApiResponse::error(__('auth.msg.insufficient_permissions'), [], Response::HTTP_FORBIDDEN);
            } */
            /* if ($user->status !== UserStatus::Active) {
                if (JWTAuth::setToken($token)->check()) {
                    JWTAuth::invalidate($token);
                }
                return ApiResponse::error(__('auth.msg.account_not_active'), [], Response::HTTP_FORBIDDEN);
            } */
        } catch (JWTException $e) {
            Log::error('Error : ' . $e->getMessage());
            return ApiResponse::error(__('messages.something_went_wrong'), [], Response::HTTP_UNAUTHORIZED);
        } catch (\Exception $e) {
            Log::error('Error : ' . $e->getMessage());
            return ApiResponse::error(__('messages.something_went_wrong'), [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        // Step 5: Return the token and user details
        return ApiResponse::success([
            'token' => $token,
            'profile' => $user->toArray()
        ], __('auth.msg.login_success'));
    }
    /**
     * Send a password reset link to the user's email.
     */
    public function forgotPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), ['email' => 'required|email']);
            if ($validator->fails()) {
                return ApiResponse::error('', $validator->errors()->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            // Instead of using Password::sendResetLink(), use the custom notification
            // $user = User::getSiteUserOnly()->where('email', $request->email)->first();
            $user = User::where('email', $request->email)->first();
            if ($user) {
                // Generate the reset token
                $token = Password::broker()->createToken($user);
                $user->notify(new CustomResetPasswordNotification($token));
                return ApiResponse::success([], __('auth.msg.fp_send_reset_link_success'));
            }
            return ApiResponse::error(__('auth.msg.fp_send_reset_link_success'), [], Response::HTTP_OK);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            Log::error('Error : ' . $e->getMessage());
            return ApiResponse::error(__('messages.something_went_wrong'), [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    /**
     * Reset the password.
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'email' => 'required|string|email',
            #'password' => 'required|string|min:8|confirmed',
            'password' => array_filter([
                'required',
                'string',
                Pwd::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ]),
            'password_confirmation' => 'required|string|same:password',
        ]);
        if ($validator->fails()) {
            return ApiResponse::error('', $validator->errors()->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $status = Password::broker()->reset(
            $request->only('email', 'password', 'token'),
            function ($user, $password) {
                $user->password = $password;
                $user->save();
            }
        );
        if ($status === Password::PASSWORD_RESET) {
            return ApiResponse::success([], __('auth.msg.password_reset_success'));
        }
        return ApiResponse::error(__('auth.msg.password_reset_error'), [], Response::HTTP_BAD_REQUEST);
    }
    /**
     * Refresh JWT Token
     */
    public function refreshToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'refresh_token' => 'required|string',
        ]);
        if ($validator->fails()) {
            return ApiResponse::error('', $validator->errors()->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $refreshToken = $request->input('refresh_token') ?? $request->bearerToken();
        try {
            $newToken = JWTAuth::refresh($refreshToken);
            return ApiResponse::success([
                'token' => $newToken
            ], __('auth.msg.token_refreshed_successfully'));
        } catch (JWTException $e) {
            Log::error('Error refreshing token: ' . $e->getMessage());
            return ApiResponse::error(__('auth.msg.token_refresh_error'), [], Response::HTTP_UNAUTHORIZED);
        }
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();
        //JWTAuth::invalidate(JWTAuth::getToken());
        return ApiResponse::success([], 'Successfully logged out');
    }
}
