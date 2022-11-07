@extends('layouts.app')

@section('title', 'users')

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
        <p class="container__title">Users</p>
        <div class="">
            <form action="" class="search-form">
                <input type="text" class="input input--search" placeholder="Search user">
                <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="table">
            <div>
                <div class="table__row table__row--labels">
                    <p class="table__info table__info--short">id</p>
                    <p class="table__info table__info--mid-long">username</p>
                    <p class="table__info table__info--long">First name</p>
                    <p class="table__info table__info--long">Last name</p>
                    <p class="table__info table__info--long">email</p>
                    <p class="table__info table__info--medium">birthday</p>
                    <p class="table__info table__info--short"> </p>
                    <p class="table__info table__info--short"> </p>
                </div>
            </div>
            <div>
                <ul>
                    @foreach($users as $userData)
                    @include('admin.user')
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
