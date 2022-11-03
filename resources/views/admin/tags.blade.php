@extends('layouts.app')

@section('title', 'tags')

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
        <p class="container__title">Tags</p>
        <div class="">
            <form action="{{url('/admin/tags/added')}}" method="POST" class="search-form" enctype="multipart/form-data">
                @csrf
                <input type="text" class="input input--search" name="name" placeholder="New tag">
                <button type="submit" class="btn"><i class="fa-solid fa-plus"></i></button>
            </form>
        </div>
        <div class="table">
            <div>
                <ul class="table__row table__row--labels">
                    <li class="table__info table__info--short">id</li>
                    <li class="table__info table__info--long">Name</li>
                    <li class="table__info table__info--short"></li>
                </ul>
            </div>
            <div>
                @foreach($tags as $tag)
                <ul class="table__row">
                    <li class="table__info table__info--short">{{$tag->id}}</li>
                    <li class="table__info table__info--long table__tag-name table__tag-{{$tag->id}}">{{$tag->name}}</li>
                    <li class="table__info table__info--long edit-tag-{{$tag->id}} tag-hide">
                        <form action="{{url('/admin/tags/edited')}}" class="table__edit" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="text" value="{{$tag->name}}" name="name" class="input">
                            <input type="hidden" name="id" value="{{$tag->id}}">
                            <button type="submit" class="table__btn table__btn--done"><i class="fa-solid fa-circle-check"></i></button>
                        </form>
                    </li>
                    <li class="table__info table__info--short">
                        <button class="table__btn table__btn--edit btn__edit-tag btn__edit-tag-{{$tag->id}}"><i data-name="{{$tag->name}}"
                            data-id="{{$tag->id}}" class="fa-solid fa-pen-to-square"></i></button>
                    </li>
                    <li class="table__info table__info--short">
                        <form action="{{url('admin/tags/' . $tag->id . '/delete')}}" method="GET">
                            <button class="table__btn table__btn--delete table__btn--delete-tag-{{$tag->id}}"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection 

@section('script') 
<script src="{{ asset('js/dataTags.js') }}"></script>
@endsection