<!-- resource/views/course/list.blade.php -->

@extends('layouts.app')

@section('title', 'Explore')

@section('content') 
<section class="section section--column"> 
    <div class="filter">
        <button class="btn btn--select filter__btn">Filter <i class="fa-solid fa-chevron-down filter__icon--down"></i> <i class="fa-solid fa-chevron-up filter__icon--up filter__icon--hide"></i></button>
        <form action="" class="filter__form filter__form--hide" method="GET" id="filter__form">
            @foreach($tags as $tag)
            @if(in_array($tag->name, $selectedTags))
            <div class="filter__tag">
                <input type="checkbox" value="{{$tag->name}}" name="tags[]" checked>
                <label for="{{$tag->name}}">{{$tag->name}}</label>
            </div>
            @else
            <div class="filter__tag">
                <input type="checkbox" value="{{$tag->name}}" name="tags[]">
                <label for="{{$tag->name}}">{{$tag->name}}</label>
            </div>
            @endif
            @endforeach 
            <button class="btn btn--filter" type="submit" for="filter__form"><i class="fa-solid fa-filter"></i></i></button>
        </form>
    </div>
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

@section('script') 
<script src="{{ asset('js/explore.js') }}"></script>
@endsection


