<?php

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 

Route::get('/home/{selectedTags?}', function ($selectedTags = null) {
    if  ($selectedTags) {
        $posts = Post::join('post_tag', 'posts.id', '=', 'post_tag.post_id')
        ->join('tags', 'tags.id', '=', 'post_tag.tag_id')
        ->whereIn('tags.name', explode(',', $selectedTags))
        ->inRandomOrder()
        ->get('*')
        ->unique('post_id');
    } else {
        $posts = Post::inRandomOrder()->get();
    }

    $content = '';

    foreach($posts as $post) {
        $content .= view('explore.card', ['post' => $post])->render();
    }

    return $content;

});

Route::get('/admin/posts/{searchedUser?}', function ($searchedUser = null) {
    if (strlen($searchedUser) > 0) {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
        ->where('country', 'like', '%' . $searchedUser . '%')
        ->orWhere('city', 'like', '%' . $searchedUser . '%')
        ->orWhere('title', 'like', '%' . $searchedUser . '%')
        ->orWhere('users.username', 'like', '%' . $searchedUser . '%')
        ->get(['posts.*', 'users.username'])
        ->sortBy('id');
    } else {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
        ->get(['posts.*', 'users.username'])
        ->sortBy('id');
    }

    $content = '';

    foreach($posts as $post) {
        $content .= view('admin.post', ['post' => $post])->render();
    }
});

Route::get('/admin/posts/{searchedPost?}', function ($searchedPost = null) {

});