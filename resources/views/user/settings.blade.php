@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="card card--user">
        <p>{{$user->firstName}}</p>
        <p>{{$user->lastName}}</p>
        <p>{{$user->username}}</p>
        <p>{{$user->email}}</p>
        <p>{{$user->user_img}}</p>
        </div>
    </section>
@endsection