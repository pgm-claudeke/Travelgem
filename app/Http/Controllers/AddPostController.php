<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class AddPostController extends Controller
{
    public function index() {
        return view('add.post');
    }

    public function save(Request $request, $id = null) {
        $user = Auth::user();
        $userId = $user->id;

        $post = ($id) ? Post::findOrFail($id) : new Post();

        if( $request->file('image') ) {
            $uploaded_path = $request ->file('photo')->store('posts');
            $filename = basename($uploaded_path);
        };

        $post->user_id = $userId;
        $post->country = $request->input('country');
        $post->city = $request->input('city');
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        if( isset($filename) ) {
            $post->image = $filename;
        };

        $post->save();

        return redirect('/post/' . $post->id);
    }
}