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

        $saves = Save::where('user_id', $userId)->get();

        return view('user.list', [
            'user' => $user,
            'posts' => $posts,
            'saves' => $saves
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

        return view('user.saved', [
            'user' => $user, 
            'saves' => $saves,
            'posts' => $posts
        ]);
    }

    public function settings() {
        $user = Auth::user();

        return view('user.settings', [
            'user' => $user, 
        ]);
    } 

}