<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/firstLog', [HomeController::class, 'firstLog']);

Route::get('/allActivities', [HomeController::class, 'allActivities']);

Route::get('/createNewUser', [HomeController::class, 'createNewUser']);

Route::get('/updateUser', [HomeController::class, 'updateUser']);

Route::get('/deleteUser', [HomeController::class, 'deleteUser']);

