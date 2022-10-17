<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Models\Post;

class PostController extends Controller
{
    public function index($id) {
        $post = Post::find($id);

        //post opslaan

        return view('post.detail', [ 
            'post_id' => $id,
            'post' => $post
        ]);
    }
}