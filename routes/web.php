<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile-setting', [HomeController::class, 'profile'])->name('profile');
Route::get('/generate-qrcode', [HomeController::class, 'generateqrcode'])->name('generateqrcode');
Route::get('/add-corpse', [HomeController::class, 'add_corpse'])->name('add_corpse');
Route::get('/all-corpse', [HomeController::class, 'allCorpse'])->name('allCorpse');
Route::get('/available-corpse', [HomeController::class, 'availableCorpse'])->name('availableCorpse');
Route::get('/removed-corpse', [HomeController::class, 'removedCorpse'])->name('removedCorpse');
Route::get('/missing-corpse', [HomeController::class, 'missingCorpse'])->name('missingCorpse');
Route::get('/autopsy-corpse', [HomeController::class, 'autopsyCorpse'])->name('autopsyCorpse');
Route::get('/mortuary-setting', [HomeController::class, 'settings'])->name('settings');
Route::get('/profile-account-setting', [HomeController::class, 'accountSetting'])->name('accountSetting');
Route::post('/update/password', [HomeController::class, 'updatePassword'])->name('update.password');
Route::post('/profile/update', [HomeController::class, 'update'])->name('profile.update');
Route::post('/enrol-corpse', [HomeController::class, 'addCorpse'])->name('add.corspe');
Route::get('/storage/freezers', [HomeController::class, 'freezer'])->name('freezer');
Route::get('/storage/embalments', [HomeController::class, 'embalm'])->name('embalm');
Route::post('/freezer/store', [HomeController::class, 'store'])->name('freezer.store');
Route::post('/embalments/store', [HomeController::class, 'storeembalments'])->name('embalment.store');
Route::put('/freezers/{id}', [HomeController::class, 'updatefreezer'])->name('freezers.update');
Route::put('/embalments/{id}', [HomeController::class, 'updateembalments'])->name('embalment.update');
Route::post('/settings/save', [HomeController::class, 'savesetting'])->name('settings.save');
Route::post('/qr/code', [HomeController::class, 'qrCode'])->name('qr.code');
Route::get('/corpse/{qr_code}/profile', [HomeController::class, 'corpseProfile'])->name('corpseProfile');
Route::put('/corpse/{qr_code}/update', [HomeController::class, 'updateCorpse'])->name('corpse.update');