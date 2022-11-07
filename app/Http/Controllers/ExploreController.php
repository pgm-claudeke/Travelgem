<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Models\Post;
use App\Models\Tag; 
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function index($selectedTags = null) {
        $user = Auth::user();
        
        $tags = Tag::all()->sortBy('name');

        if (empty($_GET)) {
            $selectedTags = []; 
        } else {
            $selectedTags = $_GET['tags'];
        }

        if (count($selectedTags) > 0) {
            $posts = Post::join('post_tag', 'posts.id', '=', 'post_tag.post_id')
            ->join('tags', 'tags.id', '=', 'post_tag.tag_id')
            ->where('tags.name', '=', $selectedTags)
            ->inRandomOrder()
            ->get('*')
            ;
        } else {
            $posts = Post::inRandomOrder()->get();
        }

        return view('explore.list', [
            'posts' => $posts,
            'tags' => $tags,
            'selectedTags'=> $selectedTags, 
            'user' => $user
        ]);
    }
}