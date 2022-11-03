@extends('layouts.app')

@section('title', 'settings')

@section('content')

<section class="section section--row">
    <div class="side-nav">
        <ul class="side-nav__list">
            <li><a class="side-nav__nav" href="/user/settings"><i class="fa-regular fa-circle-user"></i> Edit profile</a></li>
            <li><a class="side-nav__nav" href="/user/password"><i class="fa-solid fa-key"></i> Change password</a></li>
            <li><a class="side-nav__nav" href="/user/delete"><i class="fa-solid fa-user-slash"></i> Delete account</a></li>
        </ul>
    </div>
    <div class="container container--side-nav container--edit">
        <p class="container__title">Delete account</p>
        <p>Are you sure you want to delete this account?</p>
        <form action="" method="post">
            <button>Delete</button>
        </form>
    </div>
</section>
@endsection