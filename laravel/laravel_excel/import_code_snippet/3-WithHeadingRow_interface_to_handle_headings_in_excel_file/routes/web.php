<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UsersImportController;
Route::get("users/import", [UsersImportController::class, "show"])->name('import-form');
Route::post("users/import", [UsersImportController::class, "store"])->name('import-submit');