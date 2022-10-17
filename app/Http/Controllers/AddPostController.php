<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AddPostController extends Controller
{
    public function index() {
        return view('add.post');

        //toevoegen van nieuwe post
    }
}