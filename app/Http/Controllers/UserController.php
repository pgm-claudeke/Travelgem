<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        return view('user.list');
    }

    public function detail($id) {
        return view('user.detail', [
            'user.id' => $id
        ]);
    } 

}