<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Symfony\Component\Console\Input\Input;

class AddPostController extends Controller
{
    public function index() {
        $user = Auth::user();
        $tags = Tag::all()->sortBy('name');

        return view('add.post', [
            'tags' => $tags,
            'user' => $user
        ]);
    }

    public function save(Request $request, $id = null) {
        $user = Auth::user();
        $userId = $user->id; 

        $post = ($id) ? Post::findOrFail($id) : new Post();

        if( $request->file('image') ) {
            $uploaded_path = $request->file('image')->store('public/posts');
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
        $post->tags()->sync($request->input('tags'));
        
        return redirect('/post/' . $post->id);
    }
}