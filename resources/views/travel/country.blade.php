@extends('layouts.app')

@section('title', 'Country')

@section('content')
<section class="section section--country">
    <p class="section__title">{{$country}}</p>
    <p class="section__subtitle">{{$city}}</p>
    <div class="filter filter--drop-down">
        <button class="btn btn--select btn--filter select-city">Select city <i class="fa-solid fa-chevron-down"></i></button>
        <div class="filter__drop-down filter__drop-down--hide">
            <ul class="filter__list">
                <li class="filter__option"><a class="filter__option-link" href="/travel/{{$country}}">All</a></li>
                @foreach($cities as $city)
                <li class="filter__option"><a class="filter__option-link" href="/travel/{{$country}}/{{$city->city}}">{{$city->city}}</a></li>
                @endforeach 
            </ul>
        </div>
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

@section('script') 
<script src="{{ asset('js/country.js') }}"></script>
@endsection

