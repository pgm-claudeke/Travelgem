<!-- resource/views/course/detail.blade.php -->
@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <section class="section section--post">
        <form action="{{url('/edited-post')}}" method="POST">
            <input type="hidden" value="{{$post->id}}" name="id">
        @csrf
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
                        <div class="post__subtitle">
                            <input class="input input--medium" type="text" name="country" placeholder="Country" value="{{$post->country}}">
                            <input class="input input--medium" type="text" name="city" placeholder="City" value="{{$post->city}}">
                        </div>
                    </div>
                </div>
                <div class="post__container post__container--info">  
                    <input class="post__title input input--large" type="text" name="title" placeholder="Title" value="{{$post->title}}">
                    <textarea class="post__description input input--large input--text-edit" type="textarea" name="description" placeholder="Description" value="">{{$post->description}}</textarea>
                </div> 
                <div class="post__container post__container--info">
                    <label for="tags" class="post__title">Tags</label>
                    <div class="input__tags input__tags--edit">
                        @foreach($tags as $tag)
                        <div>
                            @if($post->tags->contains('id', $tag->id))
                            <input type="checkbox" value="{{$tag->id}}" id="tags" name="tags[]" checked>
                            @else
                            <input type="checkbox" value="{{$tag->id}}" id="tags" name="tags[]">
                            @endif
                            <label for="">{{$tag->name}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn" type="submit">Done</button>
            </div>
        </div>      
        </form>
    </section>
@endsection