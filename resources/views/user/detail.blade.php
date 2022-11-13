@extends('layouts.app')

@section('title', 'posts')

@section('content')
<section class="section">
    <div class="user">
        <div class="user__info">
            <div class="user__img-box"> 
                    @if($user->user_img)
                    <img class="user__img" src="{{ asset('storage/user_images/' . $user->user_img) }}" alt="{{$user->user_img}}">
                    @else
                    <img class="user__img"  src="{{ asset('storage/user_images/user.jpg') }}" alt="user.jpg">
                    @endif
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

<section class="section">
    <ul class="list">
            @foreach($posts as $post) 
            @include('user.list')
            @endforeach
        </ul>
</section>
@endsection 