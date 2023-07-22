<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
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

// Tag Routes
Route::get('tag/index',[TagController::class, 'index'])->name('tag.index');
Route::get('tag/create',[TagController::class, 'create'])->name('tag.create');
Route::post('tag/store',[TagController::class, 'store'])->name('tag.store');
Route::get('tag/{tag}/edit',[TagController::class, 'edit'])->name('tag.edit');
Route::patch('tag/{tag}',[TagController::class, 'update'])->name('tag.update');
