<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CommentController;
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
Route::as('auth.')->group(function(){
    Route::get('signup', [AuthController::class, 'getSignupForm'])->name('signup');
    Route::post('signup', [AuthController::class, 'registerUser'])->name('register');
    Route::get('signin', [AuthController::class, 'getSigninForm'])->name('signin');
    Route::post('signin', [AuthController::class, 'signingInUser'])->name('signin');
    Route::get('signout', [AuthController::class, 'signout'])->name('signout')->middleware(['auth']);
});


// Admin Dashboard
Route::prefix('admin')->as('admin.')->middleware(['auth'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('post/index', [PostController::class, 'adminIndex'])->name('post.index');
    Route::get('tag/tags', [TagController::class, 'adminIndex'])->name('tag.index');
});

// User Routes
Route::prefix('user')->as('user.')->middleware(['auth'])->group(function(){
    Route::get('index', [UserController::class, 'index'])->name('index');
    Route::get('{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::get('{user}', [UserController::class, 'show'])->name('show');
    Route::patch('{user}', [UserController::class, 'update'])->name('update');
});

// Post Routes
Route::as('post.')->prefix('post')->group(function(){
    Route::middleware(['auth'])->group(function(){
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
        Route::patch('/{post}', [PostController::class, 'update'])->name('update');
    });
    Route::get('/index', [PostController::class, 'index'])->name('index');
    Route::get('/{post}', [PostController::class, 'show'])->name('show');
});

// Comment Routes
Route::post('comment/{post}', [CommentController::class, 'store'])->name('comment.store')->middleware(['auth']);

// Tag Routes
Route::prefix('tag')->as('tag.')->group(function(){
    Route::middleware(['auth'])->group(function(){
        Route::get('/create',[TagController::class, 'create'])->name('create');
        Route::post('/store',[TagController::class, 'store'])->name('store');
        Route::get('/{tag}/edit',[TagController::class, 'edit'])->name('edit');
        Route::patch('/{tag}',[TagController::class, 'update'])->name('update');
    });
    Route::get('/index',[TagController::class, 'index'])->name('index');
    Route::get('/{tag}', [TagController::class, 'show'])->name('show');
});


