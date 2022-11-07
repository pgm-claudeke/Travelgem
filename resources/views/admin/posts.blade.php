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
            <form action="" method="GET" class="search-form">
                <input type="text" class="input input--search" placeholder="Search post" id="searchPostAdmin" name="search">
                <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="table">
            <div class="table__row table__row--labels">
                <div class="table__info table__info--short">id</div>
                <div class="table__info table__info--mid-long">image</div>
                <div class="table__info table__info--medium">country</div>
                <div class="table__info table__info--medium">city</div>
                <div class="table__info table__info--mid-long">title</div>
                <div class="table__info table__info--extra-long">description</div>
                <div class="table__info table__info--medium">user</div>
                <div class="table__info table__info--short"></div>
                <div class="table__info table__info--short"></div>
            </div>
            <div>
                <ul id="listPostsAdmin">
                    @foreach($posts as $post)
                    @include('admin.post')
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection 

@section('script') 
<script src="{{ asset('js/adminPosts.js') }}"></script>
@endsection
