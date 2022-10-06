<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index() {
        return view('post.list');
    }

    public function detail($id) {
        return view('post.detail', [
            'post.id' => $id
        ]);
    } 

}