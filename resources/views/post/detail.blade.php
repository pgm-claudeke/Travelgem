<!-- resource/views/course/detail.blade.php -->
@extends('layouts.app')

@section('title', 'Post')

@section('content')
<section class="section section--post">
    <div class="post">
        <div class="post__container post__container--image">
            <div class="post__image-box">
                <img class="post__image" src="{{ asset('storage/posts/' . $post->image) }}"
                    alt="fabio-comparelli-uq2E2V4LhCY-unsplash.jpg">
            </div>
            @if(count($tags) > 0)
            <div>
                <ul class="post__tags">
                    @foreach($tags as $tag)
                    <li>#{{$tag->name}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="post__info">
            <div class="post__container post__container--info post__container--row">
                <a href="/travel/{{$post->country}}/{{$post->city}}" class="post__w-icon">
                    <i class="fa-solid fa-location-dot icon icon--location"></i>
                    <p class="post__subtitle">{{$post->country}}, {{$post->city}}</p>
                </a>
                @if ($post->user_id === $user->id)
                <div class="post__edit">
                    <a class="btn" href="{{$post->id}}/edit">Edit</a>
                    <form action="{{url('post/' . $post->id . '/delete-post')}}" method="GET">
                        <button class="btn" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
                @else
                <div>
                    @if($saved)
                    <form action="{{url('/post/'. $post->id .'/unsave')}}" method="GET">
                        <button class="btn btn--unsave">Unsave</button>
                    </form>
                    @else
                    <form action="{{url('/saved-post')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$post->id}}" name="post_id">
                        <button class="btn btn--save" type="submit">Save</button>
                    </form>
                    @endif
                </div>
                @endif
            </div>
            <div class="post__container post__container--info">
                <p class="post__title">{{$post->title}}</p>
                <p class="post__description">{{$post->description}}</p>
                <a href="/users/{{$postUser->id}}" class="post__user">
                    <div class="user-img user-img--small">
                        @if($postUser->user_img)
                        <img class="user-img__img" src="{{ asset('storage/user_images/' . $postUser->user_img) }}"
                            alt="{{$postUser->user_img}}">
                        @else
                        <img class="user-img__img" src="{{ asset('storage/user_images/user.jpg') }}" alt="user.jpg">
                        @endif
                    </div>
                    <p class="post__username">{{$postUser->username}}</p>
                </a>
            </div>
            <div class="post__container post__container--info post__container--column">
                <p class="post__subtitle">Comments</p>
                <div class="post__comments">
                    <ul class="post__comments">
                        @foreach($comments as $comment)
                        <li class="post__comment">
                            <a href="/users/{{$postUser->id}}" class="post__user">
                                <div class="user-img user-img--small">
                                    @if($comment->user_img)
                                    <img class="user-img__img"
                                        src="{{ asset('storage/user_images/' . $comment->user_img) }}"
                                        alt="{{$comment->user_img}}">
                                    @else
                                    <img class="user-img__img" src="{{ asset('storage/user_images/user.jpg') }}"
                                        alt="user.jpg">
                                    @endif
                                </div>
                                <div class="post__user">
                                    <p class="post__username">{{$comment->username}}</p>
                                </div>
                            </a>
                            {{$comment->comment}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <form action="{{url('/store-comment')}}" method="POST" class="post__new-comment">
                    @csrf
                    <input type="text" name="comment" id="commend" cols="30" rows="10"
                        class="input input--large">
                    <input type="hidden" value="{{$post->id}}" name="post_id">
                    <button type="submit" class="btn"><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
