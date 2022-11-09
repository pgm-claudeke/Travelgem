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

<section class="section">
    <ul class="list">
            @foreach($posts as $post) 
            @include('user.list')
            @endforeach
        </ul>
</section>

@endsection 