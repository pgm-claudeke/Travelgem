@extends('layouts.app')

@section('title', 'posts')

@section('content')
<section class="section section--row">
    <div class="side-nav">
        <ul class="side-nav__list">
            <li><a class="side-nav__nav" href="/admin"><i class="fa-solid fa-users"></i> Users</a></li>
            <li><a class="side-nav__nav" href="/admin/posts"><i class="fa-solid fa-images"></i> Posts</a></li>
            <li><a class="side-nav__nav" href="/admin/tags"><i class="fa-solid fa-tags"></i> Tags</a></li>
        </ul>
    </div>
    <div class="container container--side-nav container--data">
        <p class="container__title">Posts</p>
        <div class="">
            <form action="" class="search-form">
                <input type="text" class="input input--search" placeholder="Search post">
                <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="table">
            <div>
                <ul class="table__row table__row--labels">
                    <li class="table__info table__info--short">id</li>
                    <li class="table__info table__info--mid-long">image</li>
                    <li class="table__info table__info--medium">country</li>
                    <li class="table__info table__info--medium">city</li>
                    <li class="table__info table__info--mid-long">title</li>
                    <li class="table__info table__info--extra-long">description</li>
                    <li class="table__info table__info--medium">user</li>
                    <li class="table__info table__info--short"></li>
                    <li class="table__info table__info--short"></li>
                </ul>
            </div>
            <div>
                @foreach($posts as $post)
                <ul class="table__row">
                    <li class="table__info table__info--short">{{$post->id}}</li>
                    <li class="table__info table__info--mid-long">
                    <img class="table__img" src="{{ asset('storage/posts/' . $post->image) }}" alt="{{$post->image}}">
                    </li>
                    <li class="table__info table__info--medium">{{$post->country}}</li>
                    <li class="table__info table__info--medium">{{$post->city}}</li>
                    <li class="table__info table__info--mid-long">{{$post->title}}</li>
                    <li class="table__info table__info--extra-long">{{substr($post->description, 0, 30)}}...</li>
                    <li class="table__info table__info--medium">{{$post->username}}</li>
                    <li class="table__info table__info--short"><a href="/post/{{ $post->id }}" class="table__btn table__btn--link"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></li>
                    <li class="table__info table__info--short">
                        <form action="{{url('/admin/posts/'. $post->id . '/delete')}}" method="get">
                            <button class="table__btn table__btn--delete"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection 