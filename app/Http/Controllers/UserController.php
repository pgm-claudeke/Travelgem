<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Save;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        $userId = $user->id;

        $posts = Post::where('user_id', $userId) 
            ->latest()
            ->get()
        ;

        $numberOfPosts = Post::where('user_id', $userId)->count();
        $numberOfSaves = Save::where('saves.user_id', $userId)->join('posts', 'saves.post_id', '=', 'posts.id')->count();

        return view('user.list', [
            'user' => $user,
            'posts' => $posts,
            'numberOfPosts' => $numberOfPosts,
            'numberOfSaves' => $numberOfSaves,
        ]);
    }

    public function saved() {
        $user = Auth::user();

        $posts = Post::where('user_id', $user->id) 
        ->latest()
        ->get()
        ;

        $saves = Save::join('posts', 'saves.post_id', '=', 'posts.id')
            ->where('saves.user_id', $user->id)
            ->get()
        ;

        $numberOfPosts = Post::where('user_id', $user->id)->count();
        $numberOfSaves = Save::where('saves.user_id', $user->id)->join('posts', 'saves.post_id', '=', 'posts.id')->count();

        return view('user.saved', [
            'user' => $user, 
            'saves' => $saves,
            'posts' => $posts,
            'numberOfPosts' => $numberOfPosts,
            'numberOfSaves' => $numberOfSaves,
        ]);
    }

    public function settings() {
        $user = Auth::user();

        return view('user.settings', [
            'user' => $user, 
        ]);
    } 

}