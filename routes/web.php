<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\UserController;

	Route::post('/register', [RegisterController::class, 'store'])->middleware('auth')->name('register');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/', [FilesController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/tables', [FilesController::class, 'index'])->name('tables');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	Route::post('/add-data', [FilesController::class, 'store'])->name('add-data');
	Route::post('/edit/{file}', [FilesController::class, 'update'])->name('edit');
	Route::get('/delete/{file}', [FilesController::class, 'destroy'])->name('delete');
	Route::get('/manage', [UserController::class, 'index'])->name('manage');
	Route::get('/new-user', [UserController::class, 'store'])->name('new-user');
	Route::get('/list-users', [UserController::class, 'index'])->name('list-users');
	Route::post('/edit/{user}', [UserController::class, 'edit'])->name('edit-user');
	Route::post('/update/{user}', [UserController::class, 'profile'])->name('update.profile');
	Route::delete('delete/{user}', [RegisterController::class, 'destroy'])->name('delete.user');
});