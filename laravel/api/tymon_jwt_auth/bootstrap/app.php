<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

use Illuminate\Routing\MiddlewareNameResolver;
use Tymon\JWTAuth\Http\Middleware\Authenticate as JwtMiddleware;
use App\Http\Middleware\OptionalJwtMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Symfony\Component\HttpKernel\Exception\HttpException;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Alias middleware
        $middleware->alias([
            'jwt.verify' => JwtMiddleware::class,
            'jwt.optional' => OptionalJwtMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );

        $exceptions->render(function (\Throwable $e, Request $request) {

            // Detect status code
            $statusCode = 500;
            if ($e instanceof ValidationException) {
                $statusCode = 422;
            }
            elseif ($e instanceof AuthenticationException) {
                $statusCode = 401;
            }
            elseif ($e instanceof HttpException) {
                $statusCode = $e->getStatusCode();
            }

            // Only log 4XX & 5XX
            if ($statusCode >= 400) {
                if ($e instanceof ValidationException) { // Skip validation errors completely (no log, no email)
                    return; // let Laravel handle response
                }
                /* if ($e instanceof MethodNotAllowedHttpException) {
                    return redirect('/login');
                } */

                $logData = [
                    'Status Code' => $statusCode,
                    'Message' => $e->getMessage(),
                    'URL' => $request->fullUrl(),
                    'Method' => $request->method(),
                    'File' => $e->getFile(),
                    'Line' => $e->getLine(),
                    'IP' => $request->ip(),
                    'User Agent' => $request->userAgent(),
                ];

                // Convert array to nicely formatted string
                $logMessage = "Error Details:\n" . collect($logData)
                    ->map(fn($value, $key) => "$key: $value")
                    ->implode("\n");

                // Log it
                \Log::channel('site_error_log')->error($logMessage);

                // Send email ONLY in production for 5XX
                if (app()->environment('production') && $statusCode >= 500) {

                    $emails = config('constants.development.emails', []);

                    if (!empty($emails)) {
                        $emailContent = "🚨 SERVER ERROR ALERT\n\n" . $logMessage
                            . "\n\nStack Trace (Top 10 lines):\n"
                            . collect(explode("\n", $e->getTraceAsString()))->take(10)->implode("\n");

                        Mail::raw($emailContent, function ($message) use ($emails, $statusCode) {
                            $message->to($emails)
                                ->subject("🚨 {$statusCode} Server Error - " . config('app.name') . " - " . now()->format('Y-m-d H:i:s'));
                        });
                    }
                }
            }

            #return null; // allow other handlers to work
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if (!$request->is('api/*')) {
                return response()->view('errors.404', [], 404);
            }
        });

        /*  $exceptions->render(function (HttpException $e, Request $request) {
            if ($e->getStatusCode() >= 500 && $e->getStatusCode() < 600) {
                if (!$request->is('api/*')) {
                    if ($request->expectsJson()) {
                        return response()->json(['message' => 'Server error. Please try again later.'], $e->getStatusCode());
                    }
                    // You can create a generic 5xx view or separate ones
                    return response()->view('errors.500', [], $e->getStatusCode());
                }
            }
        });

        $exceptions->render(function (\Throwable $e, Request $request) {
            if (!$request->is('api/*')) {
                if ($request->expectsJson()) {
                    return response()->json(['message' => 'Server error. Please try again later.'], 500);
                }
                return response()->view('errors.500', [], 500);
            }
        }); */
        $exceptions->render(function (ValidationException $e, $request) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => '', //!config('app.debug') ? $e->getMessage() : __('messages.something_went_wrong'),
                    'errors' => $e->errors(),
                ], 422);
            }
        });

        $exceptions->render(function (AuthenticationException $e, $request) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized access.',
                ], 401);
            }
        });

        $exceptions->render(function (TokenExpiredException $e, $request) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Token has expired.',
                ], 401);
            }
        });

        $exceptions->render(function (TokenInvalidException $e, $request) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Token is invalid.',
                ], 401);
            }
        });

        $exceptions->render(function (JWTException $e, $request) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Token is missing or not provided.',
                ], 401);
            }
        });

        $exceptions->render(function (UnauthorizedHttpException $e, $request) {
            if ($request->expectsJson() || $request->is('api/*')) {
                if (str_contains($e->getMessage(), 'Token has expired')) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Your session has expired. Please log in again.',
                    ], 401);
                }

                return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage() ?: 'Unauthorized request.',
                ], 401);
            }
        });
        /* $exceptions->render(function (ModelNotFoundException $e, $request) {
            if ($request->expectsJson() || $request->is('api/*')) {
                $model = class_basename($e->getModel());
                return response()->json([
                    'status' => 'error',
                    'message' => "$model not found.",
                ], 404);
            }
        }); */
        $exceptions->render(using: function (\Throwable $e, $request) {
            if ($request->expectsJson() || $request->is('api/*')) {
                if (
                    $e instanceof NotFoundHttpException &&
                    $e->getPrevious() instanceof ModelNotFoundException
                ) {
                    #$model = class_basename($e->getPrevious()->getModel());
                    return response()->json([
                        'status' => 'error',
                        'message' => "Record not found.",
                        'error' => config('app.debug') ? $e->getMessage() : __('messages.something_went_wrong'),
                    ], 404);
                }
                return response()->json([
                    'status' => 'error',
                    'message' => config('app.debug') ? $e->getMessage() : __('messages.something_went_wrong'),
                    'error' => config(key: 'app.debug') ? $e->getMessage() : __('messages.something_went_wrong'),
                    /* 'exception' => config('app.debug') ? [
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                        'trace' => collect($e->getTrace())->take(5), // Optional: trace limited
                    ] : null, */
                ], 500);
            }
        });
    })->create();
