<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Api\AuthRequest as ApiAuthRequest;
use App\Http\Responses\Api\ApiResponse;
use App\Http\Requests\Api\{UserRequest, UserUpdateProfileRequest};
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
use App\Http\Responses\Api\UserProfileResponse;
class ProfileController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    /* public function profile()
    {
        return ApiResponse::success(['user' => auth('api')->user()], '');
    } */
    public function profile(Request $request)
    {
        try {
            $user = $this->user;
            $profileData = new UserProfileResponse($user);

            // Fetch the data to return without the entire user object
            return ApiResponse::success(['profile' => $profileData->toArray()]);
            #return ApiResponse::success(['profile' => new UserProfileResponse($user)]);
        } catch (\Exception $e) {
            #dd($e);
            Log::error('Error : ' . $e->getMessage());
            return ApiResponse::error(__('messages.something_went_wrong'), [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function updateProfile(UserUpdateProfileRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->user;
            // $user->first_name = $request->input('first_name');
            // $user->last_name  = $request->input('last_name');
            $user->name  = $request->input('name');
            $user->email     = $request->input('email');
            // $user->city     = $request->input('city');
            // $user->post_code     = $request->input('post_code');
            if ($request->filled('password')) {
                $user->password = $request->input('password');
            }
            $user->save();
            DB::commit();
            return ApiResponse::success(['profile' => $user->toArray()], __('auth.msg.profile_update_success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error : ' . $e->getMessage());
            return ApiResponse::error(__('messages.something_went_wrong'), [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
