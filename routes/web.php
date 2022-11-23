<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\SocializeLoginController;



//default////
Route::get('/', [LoginController::class, 'index'])->name('login');

//login/////
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');


//register///
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');


//logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


///email verification
Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');
////forgetpassword
Route::get('forget-password',  [ForgotPasswordController::class, 'index']);
Route::post('forget-password',  [ForgotPasswordController::class, 'postEmail']);

///reset password
Route::get('reset-password/{token}', [ResetPasswordController::class, 'index']);
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword']);
   
//socialize login////
Route::get('auth/{driver}', [SocializeLoginController::class, 'login']);
Route::get('{driver}/callback', [SocializeLoginController::class, 'callbackFrom']);   

//dashboard///
Route::middleware('auth','is_verify_email', 'CheckRole:Admin')->group(function () {
Route::get('admindashboard', [AdminController::class, 'index'])->name('admindashboard');
});

Route::middleware('auth','is_verify_email', 'CheckRole:User')->group(function () {
    Route::get('userdashboard', [UserController::class, 'index'])->name('userdashboard');
});


//category//
Route::get('category', [CategoryController::class, 'index'])->name('categoryindex');
Route::get('categorycreate', [CategoryController::class, 'create'])->name('categorycreate');
Route::Post('category', [CategoryController::class, 'store'])->name('categorystore');

/////post routes////

Route::get('post', [PostController::class, 'index'])->name('post-list');
Route::get('post/create', [PostController::class, 'create'])->name('post-create');
Route::post('post', [PostController::class, 'store'])->name('post-store');
// Route::delete('post/destroy/{id}', [PostController::class, 'destroy'])->name('post-delete');
// Route::get('post/edit/{postid}', [PostController::class, 'edit'])->name('post-edit');
// Route::patch('post/update/{postid}', [PostController::class, 'update'])->name('post-update');
