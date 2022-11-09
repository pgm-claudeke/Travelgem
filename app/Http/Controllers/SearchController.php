<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index($search = null) {
        $user = Auth::user();

        if (empty($_GET)) {
            $search = ''; 
        } else {
            $search = $_GET['search'];
        }

        if (strlen($search) > 0) {
            $users = User::where('username', 'like', '%' . $search . '%')
            ->orWhere('firstName', 'like', '%' . $search . '%')
            ->orWhere('lastName', 'like', '%' . $search . '%')
            ->get('*')
            ->sortBy('id');

            $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->where('country', 'like', '%' . $search . '%')
            ->orWhere('city', 'like', '%' . $search . '%')
            ->orWhere('title', 'like', '%' . $search . '%')
            ->orWhere('users.username', 'like', '%' . $search . '%')
            ->get(['posts.*', 'users.username'])
            ->sortBy('id');

        } else {
            $users = [];
            $posts = [];
        }

        return view('search.list', [
            'user' => $user,
            'users' => $users,
            'posts' => $posts,
            'search' => $search
        ]);
    }
} 