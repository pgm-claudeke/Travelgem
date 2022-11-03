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
                <ul class="table__row table__row--labels">
                    <li class="table__info table__info--short">id</li>
                    <li class="table__info table__info--mid-long">username</li>
                    <li class="table__info table__info--long">First name</li>
                    <li class="table__info table__info--long">Last name</li>
                    <li class="table__info table__info--long">email</li>
                    <li class="table__info table__info--medium">birthday</li>
                    <li class="table__info table__info--short"> </li>
                    <li class="table__info table__info--short"> </li>
                </ul>
            </div>
            <div>
                @foreach($users as $userData)
                <ul class="table__row">
                    <li class="table__info table__info--short">{{$userData->id}}</li>
                    <li class="table__info table__info--mid-long">{{$userData->username}}</li>
                    <li class="table__info table__info--long">{{$userData->firstName}}</li>
                    <li class="table__info table__info--long">{{$userData->lastName}}</li>
                    <li class="table__info table__info--long">{{$userData->email}}</li>
                    <li class="table__info table__info--medium">{{$userData->birthday}}</li>
                    <li class="table__info table__info--short"><a href="" class="table__btn table__btn--link"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></li>
                    <li class="table__info table__info--short">
                        <form action="{{url('/admin/'. $userData->id .'/delete')}}" method="GET">
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
