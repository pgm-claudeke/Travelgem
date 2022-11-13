<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddPostController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SearchController;
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

Auth::routes();

Route::get('/', [HomeController::class,'index']);


Route::get('/home', [ExploreController::class, 'index']);

Route::get('post/{id}', [PostController::class, 'post']); 
Route::get('post/{id}/delete-post', [PostController::class, 'deletePost']);
Route::get('post/{id}/edit', [PostController::class, 'editPostPage']); 
Route::post('/edited-post', [PostController::class, 'editPost']); 
Route::post('/store-comment', [PostController::class, 'postComment']);
Route::post('/saved-post', [PostController::class, 'savePost']);
Route::get('/post/{id}/unsave', [PostController::class, 'unsavePost']);
Route::get('/post/{postId}/{commentId}/delete-comment', [PostController::class, 'deleteComment']);

Route::get('/travel', [TravelController::class, 'index']);
Route::get('/travel/{country}/{city?}', [TravelController::class, 'country']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/saved', [UserController::class, 'saved']);
Route::get('/user/settings', [UserController::class, 'settings']); 
Route::post('/user/settings/edit', [UserController::class, 'editUser']); 
Route::get('/user/password', [UserController::class, 'password']); 
Route::get('/user/delete', [UserController::class, 'delete']); 
Route::get('/user/{id}/delete', [UserController::class, 'deleteUser']);  
Route::get('/user/add-post', [AddPostController::class, 'index']);
Route::post('/store-post', [AddPostController::class, 'save']);

Route::get('/users/{id}', [UserController::class, 'otherUser']);

Route::get('/search', [SearchController::class, 'index']);

Route::get('/admin', [DataController::class, 'index']);
Route::get('/admin/{id}/delete', [DataController::class, 'deleteUser']);
Route::get('/admin/posts', [DataController::class, 'posts']);
Route::get('/admin/posts/{id}/delete', [DataController::class, 'deletePost']);
Route::get('/admin/tags', [DataController::class, 'tags']);
Route::get('/admin/tags/{id}/delete', [DataController::class, 'deleteTag']);
Route::post('/admin/tags/added', [DataController::class, 'postTag']);
Route::post('/admin/tags/edited', [DataController::class, 'editTag']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
}); 