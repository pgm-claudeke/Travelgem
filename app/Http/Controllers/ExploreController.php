<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ExploreController extends Controller
{
    public function index() {
        return view('explore.list');
    }

    public function detail($id) {
        return view('explore.country', [
            'explore.id' => $id
        ]);
    } 

}