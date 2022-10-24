<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Models\Post;
use App\Models\Tag;

class ExploreController extends Controller
{
    public function index() {
        $posts = Post::inRandomOrder()->get();
        $tags = Tag::all();

        return view('explore.list', [
            'posts' => $posts,
            'tags' => $tags
        ]);
    }
}