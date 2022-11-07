@extends('layouts.app')

@section('title', 'Travel')

@section('content')
    <section class="section">
        <ul class="list list--travel">
            @foreach($postsFiltered as $post)
            <li class="card card--country">
                <a href="/travel/{{$post->country}}">
                    <div class="card__info">
                        <div class="card__overlay">
                            <p class="card__title">{{$post->country}}</p>
                        </div>
                    </div>
                    <div class="card__container">
                        <img class="card__img" src="{{ asset('storage/posts/' .$post->image) }}" alt="fabio-comparelli-uq2E2V4LhCY-unsplash.jpg">
                    </div>
                </a>
            </li>
            @endforeach 
        </ul>
    </section>
@endsection 