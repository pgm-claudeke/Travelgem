<!-- resource/views/course/list.blade.php -->

@extends('layouts.app')

@section('title', 'Explore')

@section('content')
<section class="section section--column">
    <p>Filter</p>
    <form action="">
        @foreach($tags as $tag)
        <div>
            <input type="checkbox" value="{{$tag->name}}" name="{{$tag->name}}">
            <label for="{{$tag->name}}">{{$tag->name}}</label>
        </div>
        @endforeach            
    </form>
</section>
<section class="section">
    <ul class="list">
        @foreach($posts as $post)
        <li class="card card--post">
            <a href="/post/{{ $post->id }}">
                <div class="card__container">
                    <img class="card__img" src="{{ asset('storage/posts/'. $post->image) }}" alt="{{$post->image}}">
                </div>
                <div class="card__info">
                    <p class="card__title">{{$post->title}}</p>
                    <div class="card__location">
                        <i class="fa-solid fa-location-dot icon"></i>
                        <p>{{$post->country}}, {{$post->city}}</p>
                    </div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</section>
@endsection
