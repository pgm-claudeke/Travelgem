<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Models\Post;

class ExploreController extends Controller
{
    public function index() {
        $posts = Post::inRandomOrder()->get();

         //post opslaan

        return view('explore.list', [
            'posts' => $posts,
        ]);
    }
}