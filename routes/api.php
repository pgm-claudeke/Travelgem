<?php

use App\Models\Post;
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

Route::get('/home/{selectedTags?}', function ($selectedTags) {
    $posts = Post::join('post_tag', 'posts.id', '=', 'post_tag.post_id')
    ->join('tags', 'tags.id', '=', 'post_tag.tag_id')
    ->whereIn('tags.name', explode(',', $selectedTags))
    ->inRandomOrder()
    ->get('*')
    ->unique('post_id');

    $content = '';

    foreach($posts as $post) {
        $content .= view('explore.listitem', ['post' => $post])->render();
    }    

    return $content;
});
