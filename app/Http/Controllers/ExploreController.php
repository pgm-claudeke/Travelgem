<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ExploreController extends Controller
{
    public function index() {
        return view('explore.list');
    }

    public function detail() {
        return view('explore.country', [

        ]);
    } 

}