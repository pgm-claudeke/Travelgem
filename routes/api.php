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

Route::get('/admin/posts/{searchedPost?}', function ($searchedPost = null) {
    if (strlen($searchedPost) > 0) {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
        ->where('country', 'like', '%' . $searchedPost . '%')
        ->orWhere('city', 'like', '%' . $searchedPost . '%')
        ->orWhere('title', 'like', '%' . $searchedPost . '%')
        ->orWhere('users.username', 'like', '%' . $searchedPost . '%')
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

Route::get('/admin/users/{searchedUser?}', function ($searchedUser = null) {

});