@extends('layouts.app')

@section('content')
<section class="section">
    <div class="user">
        <div class="user__info">
            <div class="user__img-box">

            </div>
            <p class="user__name">{{$user->username}}</p>
        </div>
        <div class="user__activities">
            <a href="/user" class="user__activity">Posts</a>
            <a href="/user/saved" class="user__activity">Saved </i></button>
                <a href="/user/add-post" class="user__activity user__activity--link user__activity--icon"><i
                        class="fa-regular fa-square-plus"></i></a>
                <a href="/user/settings" class="user__activity user__activity--link user__activity--icon"><i
                        class="fa-solid fa-gear"></i></a>
        </div>
    </div>
</section>
<section class="section settings">
    <div class="settings__topic-box">
        <ul class="settings__topic-list">
            <li class="settings__topic"><i class="fa-regular fa-circle-user"></i> Account</li>
            <li class="settings__topic"><i class="fa-solid fa-key"></i> Password</li>
        </ul>
    </div>
    <div class="settings__container">
        <p class="settings__title">Account Settings</p>
        <form action="">
        <div>
            <p>Profile Image</p>
        </div>
        <div>
            <div>
                <label>Firstname</label>
                <p>{{$user->firstName}}</p>
            </div>
            <div>
                <label>Lastname</label>
                <p>{{$user->lastName}}</p>
            </div>
        </div>
        <div>
            <label>username</label>
            <p>{{$user->userName}}</p>
        </div>
        <div>
            <label>email</label>
            <p>{{$user->email}}</p>
        </div>
        <button type="submit">Edit Account</button>
        </form>

        <button>Delete account</button>
    </div>
</section>
@endsection
