<?php
use App\Http\Controllers\Api\V1\{AuthController, ProfileController};
use Illuminate\Support\Facades\Route;
Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
        Route::post('reset-password', [AuthController::class, 'resetPassword']);
    });
    Route::middleware(['jwt.verify'])->group(function () {
        Route::post('refresh-token', [AuthController::class, 'refreshToken']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('profile', [ProfileController::class, 'profile']);
        Route::post('profile', [ProfileController::class, 'updateProfile']);
    });
});
