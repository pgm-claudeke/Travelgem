<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TravelController;

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

Route::get('/explore', [ExploreController::class, 'index']);
Route::get('/explore/{id}', [ExploreController::class, 'detail']); 

Route::get('/travel', [TravelController::class, 'index']);
Route::get('/travel/{id}', [TravelController::class, 'detail']); 

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
