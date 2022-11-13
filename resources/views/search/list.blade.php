@extends('layouts.app')

@section('title', 'Search')

@section('content')
<section class="section section--search">
    <form action="" class="form--search form--search-long" method="GET">
        @if ($search)
        <input class="input input--search input--large " type="text" name="search" id="" value="{{$search}}">
        @else
        <input class="input input--search input--large " type="text" name="search" id="" placeholder="Search">
        @endif
        <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</section>
<section class="section section--results">
    @if(count($users)  == 0 && count($posts) === 0)
        <p>Sorry! No results found.</p> 
    @endif

    @if(count($users) > 0)
    <div>
        <h2 class="second-title">Found {{count($users)}} users:</h2>
        <ul class="list--users">
            @foreach($users as $user)
                @include('search.user')
            @endforeach
        </ul>
    </div>
    @endif
    
    @if(count($posts) > 0)
    <div>
        <h2 class="second-title">Found {{count($posts)}} posts:</h2>
        <ul class="list">
            @foreach($posts as $post)
                @include('search.post')
            @endforeach
        </ul>
    </div>
    @endif
</section>
@endsection 