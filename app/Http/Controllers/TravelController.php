<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;

class TravelController extends Controller
{
    public function index() {

        $countries = Post::all()->pluck('country');

        return view('travel.list', [
            'countries' => $countries
        ]);
    }

    public function country($country) {
        $posts = Post::where('country', $country)
            ->get()
        ;

        return view('travel.country', [
            'posts' => $posts,
            'country' => $country
        ]);
    } 
}