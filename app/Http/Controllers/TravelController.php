<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TravelController extends Controller
{
    public function index() {
        return view('travel.list');
    }

    public function detail($id) {
        return view('travel.detail', [
            'travel.id' => $id
        ]);
    } 

}