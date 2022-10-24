<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [ExploreController::class, 'index']);

Route::get('post/{id}', [PostController::class, 'index']); 
Route::get('post/{id}/delete-post', [PostController::class, 'deletePost']);
Route::get('post/{id}/edit', [PostController::class, 'editPage']); 
Route::post('/edited-post', [PostController::class, 'editPost']); 
Route::post('/store-comment', [PostController::class, 'storeComment']);
Route::post('/saved-post', [PostController::class, 'savePost']);

Route::get('/travel', [TravelController::class, 'index']);
Route::get('/travel/{country}', [TravelController::class, 'country']); 

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/saved', [UserController::class, 'saved']);
Route::get('/user/settings', [UserController::class, 'settings']); 
Route::get('user/add-post', [AddPostController::class, 'index']);
Route::post('/store-post', [AddPostController::class, 'save']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
