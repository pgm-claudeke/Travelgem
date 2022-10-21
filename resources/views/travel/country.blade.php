@extends('layouts.app')

@section('title', 'Country')

@section('content')
    <section class="section section--country">
        <p class="section__title">{{$country}}</p>
        <div class="select">
            <button class="select__btn" select>
                Select City 
                <i class="fa-solid fa-chevron-down icon--chevron"></i>
            </button>
        </div>
    </section>
    <section class="section">
        <ul class="list">
            @foreach($posts as $post)
            <li class="card card--post">
                <a href="/post/{{ $post->id }}">
                    <div class="card__container">
                        <img class="card__img" src="{{ asset('storage/posts/' .$post->image) }}" alt="{{$post->image}}">
                    </div>
                    <div class="card__info">
                        <p class="card__title">{{$post->title}}</p>
                        <div class="card__location">
                            <i class="fa-solid fa-map-pin icon"></i>
                            <p>{{$post->city}}</p>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </section>
@endsection