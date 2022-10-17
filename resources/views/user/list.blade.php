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
            <button class="user__activity">Posts</button>
            <button class="user__activity">Saved</i></button>
            <a href="/add-post" class="user__activity user__activity--link user__activity--icon"><i class="fa-regular fa-square-plus"></i></a>
        </div>
    </div>
</section>

<section>
    <ul class="list">
            @foreach($posts as $post)
            <li class="card card--post">
                <a href="/user/{{ $post->id }}">
                    <div class="card__container">
                        <img class="card__img" src="{{ asset('storage/images/$post->image') }}" alt="fabio-comparelli-uq2E2V4LhCY-unsplash.jpg">
                    </div>
                    <div class="card__info">
                        <p class="card__title">{{$post->title}}</p>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
</section>

@endsection 