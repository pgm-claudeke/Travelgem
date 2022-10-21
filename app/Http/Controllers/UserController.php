<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
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

        return view('user.list', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function settings() {
        $user = Auth::user();
        echo $user;

        return view('user.settings', [
            'user' => $user,
        ]);
    } 

}