<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

// Auth Routes
Route::get('signup', [AuthController::class, 'getSignupForm'])->name('auth.signup');
Route::post('signup', [AuthController::class, 'registerUser'])->name('auth.register');
Route::get('signin', [AuthController::class, 'getSigninForm'])->name('auth.signin');
Route::post('signin', [AuthController::class, 'signingInUser'])->name('auth.signin');
Route::get('signout', [AuthController::class, 'signout'])->name('auth.signout');

// Admin Dashboard
Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// User Routes
Route::get('user/index', [UserController::class, 'index'])->name('user.index');
Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
Route::patch('user/{user}', [UserController::class, 'update'])->name('user.update');

// Post Routes
Route::get('post/index', [PostController::class, 'index'])->name('post.index');
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/store', [PostController::class, 'store'])->name('post.store');
Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');
Route::patch('post/{post}', [PostController::class, 'update'])->name('post.update');

Route::get('admin/post/index', [PostController::class, 'adminIndex'])->name('admin.post.index');

// Tag Routes
Route::get('tag/index',[TagController::class, 'index'])->name('tag.index');
Route::get('tag/create',[TagController::class, 'create'])->name('tag.create');
Route::post('tag/store',[TagController::class, 'store'])->name('tag.store');
Route::get('tag/{tag}/edit',[TagController::class, 'edit'])->name('tag.edit');
Route::patch('tag/{tag}',[TagController::class, 'update'])->name('tag.update');

Route::get('admin/tag/tags', [TagController::class, 'adminIndex'])->name('admin.tag.index');
