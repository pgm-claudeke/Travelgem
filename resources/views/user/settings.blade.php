@extends('layouts.app')

@section('title', 'settings')

@section('content')

<section class="section section--row">
    @include('user.sidenav')
    <div class="container container--side-nav container--edit">
        <p class="container__title">Edit profile</p>
        <form action="{{url('/user/settings/edit')}}" method="post" class="form" id="editProfile" enctype="multipart/form-data">
            @csrf
            <div class="form__column">
                <label for="" class="form__label" for="user_img">Profile photo</label>
                <div class="user-img"> 
                    @if($user->user_img)
                    <img class="user-img__img" src="{{ asset('storage/user_images/' . $user->user_img) }}" alt="{{$user->user_img}}">
                    @else
                    <img class="user-img__img"  src="{{ asset('storage/user_images/user.jpg') }}" alt="user.jpg">
                    @endif
                </div>
                <input type="file" name="user_img" id="user_img" class="input--file">
            </div>
            <div class="form__row">
                <div class="form__column">
                    <label for="">First name</label>
                    <input type="text" class="input" value="{{$user->firstName}}" name="firstName">
                </div>
                <div class="form__column">
                    <label for="">Last name</label>
                    <input type="text" class="input" value="{{$user->lastName}}" name="lastName">
                </div>
            </div>
            <div class="form__column">
                <label for="">Username</label>
                <input type="text" class="input" value="{{$user->username}}" name="username">
            </div>
            <div class="form__column">
                <label for="">Email</label>
                <input type="text" class="input" value="{{$user->email}}" name="email">
            </div>
            <button class="btn" type="submit">Save changes</button>
        </form>
    </div>
</section>
@endsection
