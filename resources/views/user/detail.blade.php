@extends('layouts.app')

@section('content')

<section class="section">
    <div class="user">
        <div class="user__info">
            <div class="user__img-box"> 
                    @if($otherUser->user_img)
                    <img class="user__img" src="{{ asset('storage/user_images/' . $user->user_img) }}" alt="{{$user->user_img}}">
                    @else
                    <img class="user__img"  src="{{ asset('storage/user_images/user.jpg') }}" alt="user.jpg">
                    @endif
            </div>
            <p class="user__name">{{$otherUser->username}}</p>
        </div>
        <div class="user__activities">
            <p class="user__activity">Posts {{$numberOfPosts}}</p>
        </div>
    </div>
</section>

<section>
    <ul class="list">
            @foreach($posts as $post) 
            <li class="card card--post">
                <a href="/post/{{ $post->id }}">
                    <div class="card__container">
                        <img class="card__img" src="{{ asset('storage/posts/' . $post->image) }}" alt="fabio-comparelli-uq2E2V4LhCY-unsplash.jpg">
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