<!-- resource/views/course/list.blade.php -->

@extends('layouts.app')

@section('title', 'Explore')

@section('content') 
<section class="section section--column"> 
    <div class="filter">
        <button class="btn btn--select filter__btn">Filter <i class="fa-solid fa-chevron-down filter__icon--down"></i> <i class="fa-solid fa-chevron-up filter__icon--up filter__icon--hide"></i></button>
        <form action="" class="filter__form filter__form--hide" method="GET" id="filter__form">
            @foreach($tags as $tag)
            @if(in_array($tag->name, $selectedTags))
            <div class="filter__tag">
                <input class="tag__checkbox" type="checkbox" value="{{$tag->name}}" name="tags[]" checked>
                <label for="{{$tag->name}}">{{$tag->name}}</label>
            </div>
            @else
            <div class="filter__tag">
                <input class="tag__checkbox" type="checkbox" value="{{$tag->name}}" name="tags[]">
                <label for="{{$tag->name}}">{{$tag->name}}</label>
            </div>
            @endif
            @endforeach 
        </form>
    </div>
</section>
<section class="section">
    <ul class="list" id="listExplore">
        @foreach($posts as $post)
        @include('explore.card')
        @endforeach
    </ul>
</section>
@endsection

@section('script') 
<script src="{{ asset('js/explore.js') }}"></script>
@endsection


