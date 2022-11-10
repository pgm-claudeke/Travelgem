@extends('layouts.app')

@section('title', 'settings')

@section('content')

<section class="section section--row">
    @include('user.sidenav')
    <div class="container container--side-nav container--edit">
        <p class="container__title">Delete account</p>
        <p>Are you sure you want to delete this account?</p>
        <form action="{{url('user/' . $user->id . '/delete')}}" method="GET">
            <button class="btn">Delete</button>
        </form>
    </div>
</section>
@endsection