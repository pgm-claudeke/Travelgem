<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Save;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function editUser(Request $request) {
        $user = Auth::user();

        $editUser = User::find($user->id);

        if( $request->file('user_img') ) {
            $uploaded_path = $request->file('user_img')->store('public/user_images');
            $filename = basename($uploaded_path);
        };

        $editUser->firstName = $request->input('firstName');
        $editUser->lastName = $request->input('lastName');
        $editUser->username = $request->input('username');
        $editUser->email = $request->input('email');
        if( isset($filename) ) {
            $editUser->user_img = $filename;
        };

        $editUser->save();

        return redirect('/user');
    }

    public function password() {
        $user = Auth::user();

        return view('user.password', [
            'user' => $user, 
        ]);
    } 

    public function delete() {
        $user = Auth::user();

        return view('user.delete', [
            'user' => $user, 
        ]);
    } 

    public function otherUser($id) {
        $user = Auth::user();

        $otherUser = User::find($id);
        
        $posts = Post::where('user_id', $id) 
        ->latest()
        ->get()
        ;

        $numberOfPosts = Post::where('user_id', $id)->count();

        return view('user.detail', [
            'user' => $user, 
            'otherUser' => $otherUser,
            'posts' => $posts,
            'numberOfPosts' => $numberOfPosts,
        ]);
    }

}