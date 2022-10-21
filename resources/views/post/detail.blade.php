<!-- resource/views/course/detail.blade.php -->
@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <section class="section section--post">
        <div class="post">
            <div class="post__container post__container--image"> 
                <div class="post__image-box">
                    <img class="post__image" src="{{ asset('storage/posts/' . $post->image) }}" alt="fabio-comparelli-uq2E2V4LhCY-unsplash.jpg">
                </div>
            </div>
            <div class="post__info">
                <div class="post__container post__container--info post__container--row">
                    <div class="post__w-icon">
                        <i class="fa-solid fa-location-dot icon icon--location"></i>    
                        <p class="post__subtitle">{{$post->country}}, {{$post->city}}</p>
                    </div>
                    @if ($post->user_id === $user->id)
                    <button class="btn btn--save">Edit</button>
                    @else
                    <button class="btn btn--save">Save</button>
                    @endif
                </div>
                <div class="post__container post__container--info">  
                    <p class="post__title">{{$post->title}}</p> 
                    <p class="post__description">{{$post->description}}</p>
                    <div class="post__user">
                        <p class="post__username">{{$postUser->username}}</p>
                    </div>
                </div>
                <div class="post__container post__container--info post__container--column">
                    <div class="post__w-icon">
                        <p class="post__subtitle">Comments</p>
                        <i class="fa-solid fa-chevron-down icon icon--chevron"></i>
                    </div>
                    <div>
                        <ul class="post__comments">
                            @foreach($comments as $comment)
                                <li class="post__comment">
                                    <div class="post__user">
                                        <p class="post__username">{{$comment->username}}</p>
                                    </div>
                                    {{$comment->comment}}
                                </li>
                            @endforeach
                        </ul>
                    </div>   
                    <form action="{{url('/store-comment')}}" method="POST" class="post__new-comment">
                    @csrf
                        <textarea name="comment" id="commend" cols="30" rows="10" class="input input--large input--comment"></textarea>
                        <input type="hidden" value="{{$post->id}}" name="post_id">
                        <button type="submit" class="btn btn--comment"><i class="fa-solid fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection