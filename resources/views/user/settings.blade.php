@extends('layouts.app')

@section('content')

<section class="section settings">
    <div class="settings__topic-box">
        <ul class="settings__topic-list">
            <li class="settings__topic"><i class="fa-regular fa-circle-user"></i> Account</li>
            <li class="settings__topic"><i class="fa-solid fa-key"></i> Password</li>
        </ul>
    </div>
    <div class="settings__container">
        <p class="settings__title">Account Settings</p>
        <form action="" class="settings__form">
        <div>
            <p>Profile Image</p>
            <input type="file">
        </div>
        <div class="settings__box settings__box--row">
            <div class="settings__box">
                <label class="settings__label">Firstname</label>
                <input type="text" value="{{$user->firstName}}" class="input">
            </div>
            <div class="settings__box">
                <label  class="settings__label">Lastname</label>
                <input type="text" value="{{$user->lastName}}" class="input">
            </div>
        </div>
        <div class="settings__box">
            <label  class="settings__label">username</label>
            <input type="text" value="{{$user->userName}}" class="input">
        </div>
        <div class="settings__box">
            <label  class="settings__label">email</label>
            <input type="text" value="{{$user->email}}" class="input">
        </div>
        <button type="submit">Edit Account</button>
        </form>

        <button>Delete account</button>
    </div>
</section>
@endsection
