@extends('layouts.auth')

@section('content')
<section class="section section--auth">
    <div class="preview">
        <img class="preview__logo" src="{{ asset('storage/logo/travelgem_logo_white.svg') }}" alt="">
        <div class="preview__img-box">
            <img class="preview__img" src="{{ asset('storage/images/fabio-comparelli-uq2E2V4LhCY-unsplash.jpg') }}" alt="fabio-comparelli-uq2E2V4LhCY-unsplash.jpg">
        </div>
    </div>  
    <div class="container container--form container--auth">
        <div>
            <h3 class="container__title container__title--center">Welcome to Travelgem</h3>
            <p class="container__description container__description--center">Let's travel together.</p>
        </div>
        <div class="form--auth form--login">
            <form action="{{ route('login') }}" method="POST" class="form form--auth"> 
                @csrf
                <div class="form__errors">
                    @error('email')
                    <div class="form-__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @error('password')
                    <div class="form__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <input type="text" placeholder="Email" name="email" class="input input--large">
                <input type="password" placeholder="Password" name="password" class="input input--large">
                <div>
                    <input type="checkbox" name="remember">
                    <label for="rememner">Remember me</label>
                </div>
                <button class="btn btn--large">Login</button>
            </form>
        </div>
        <div class="form--auth">
            <p class="form__description">Don't have an account?</p>
            <a href="/register" class="btn btn--large btn--reversed">Sign up</a>
        </div>
    </div>
</div>
@endsection