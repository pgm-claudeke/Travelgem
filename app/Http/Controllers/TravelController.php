<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class TravelController extends Controller
{
    public function index() {

        $postsFiltered = DB::table('posts')->select(DB::raw('country, max(image) as image'))->groupBy('country')->get();
        //dd($postsFiltered);

        return view('travel.list', [
            'postsFiltered' => $postsFiltered
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