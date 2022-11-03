<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TravelController extends Controller
{
    public function index() {
        $user = Auth::user();

        $postsFiltered = DB::table('posts')->select(DB::raw('country, max(image) as image'))->groupBy('country')->get();

        //dd($postsFiltered);

        return view('travel.list', [
            'postsFiltered' => $postsFiltered,
            'user' => $user
        ]);
    }

    public function country($country, $city = null) {
        $cities = DB::table('posts')->where('country', $country)->select(DB::raw('city'))->groupBy('city')->get();
        $user = Auth::user();

        if ($city) {
            $posts = Post::where('country', $country)
            ->where('city', $city)
            ->inRandomOrder()
            ->get()
        ;
        } else {
            $posts = Post::where('country', $country)
            ->inRandomOrder()
            ->get()
        ;
        }


        return view('travel.country', [
            'posts' => $posts,
            'country' => $country,
            'cities' => $cities,
            'city' => $city,
            'user' => $user
        ]);
    }
} 