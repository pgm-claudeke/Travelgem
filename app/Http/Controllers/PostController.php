<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index($id) {
        $post = Post::find($id);

        $postUser = User::where('id', $id)->first();

        $user = Auth::user();

        return view('post.detail', [ 
            'post_id' => $id,
            'post' => $post,
            'user' => $user,
            'postUser' => $postUser
        ]);
    }
} 