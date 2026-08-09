<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/product/create', [ProductController::class, 'create']);
Route::post('/test/product/store', [ProductController::class, 'store']);
