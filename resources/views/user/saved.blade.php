@extends('layouts.app')

@section('content')

<section class="section">
    <div class="user">
        <div class="user__info">
            <div class="user__img-box"> 

            </div>
            <p class="user__name">{{$user->username}}</p>
        </div>
        <div class="user__activities">
            <a href="/user" class="user__activity">Posts {{$numberOfPosts}}</a>
            <a href="/user/saved" class="user__activity">Saved {{$numberOfSaves}}</i></button>
            <a href="/user/add-post" class="user__activity user__activity--link user__activity--icon"><i class="fa-regular fa-square-plus"></i></a>
        </div>
    </div>
</section>

<section>
    <ul class="list">
            @foreach($saves as $saved) 
            <li class="card card--post">
                <a href="/post/{{ $saved->id }}">
                    <div class="card__container">
                        <img class="card__img" src="{{ asset('storage/posts/' . $saved->image) }}" alt="{{$saved->image}}g">
                    </div>
                    <div class="card__info">
                        <p class="card__title">{{$saved->title}}</p>
                        <div class="card__location">
                            <i class="fa-solid fa-location-dot icon"></i>
                            <p>{{$saved->country}}, {{$saved->city}}</p>
                        </div>
                    </div> 
                </a> 
            </li>
            @endforeach
        </ul>
</section>

@endsection 