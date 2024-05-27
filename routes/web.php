<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile-setting', [HomeController::class, 'profile'])->name('profile');
Route::get('/profile-account-setting', [HomeController::class, 'accountSetting'])->name('accountSetting');
Route::post('/update/password', [HomeController::class, 'updatePassword'])->name('update.password');
Route::post('/profile/update', [HomeController::class, 'update'])->name('profile.update');