<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\UserController;

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
Route::get('/home/{id}', [ExploreController::class, 'detail']); 

Route::get('/travel', [TravelController::class, 'index']);
Route::get('/travel/{id}', [TravelController::class, 'detail']); 

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'detail']); 

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
