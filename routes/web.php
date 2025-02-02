<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::resource('/posts', HomeController::class)->middleware('auth');

Route::get('logout', [AuthController::class,'logout']);
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/posts', function () {
//         return view('posts');
//     });
// });
