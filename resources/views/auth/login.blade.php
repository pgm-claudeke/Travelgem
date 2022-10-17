@extends('layouts.auth')

@section('content')
<div class="login-register">
    <div class="logo-box">
        <img class="logo-box__logo" src="{{ asset('storage/logo/travelgem_logo_white.svg') }}" alt="">
        <div class="logo-box__img-box">
            <img class="logo-box__img" src="{{ asset('storage/images/fabio-comparelli-uq2E2V4LhCY-unsplash.jpg') }}" alt="fabio-comparelli-uq2E2V4LhCY-unsplash.jpg">
        </div>
    </div>
    <div class="form-box">
        <div class="form-box__title-box">
            <h3 class="form-box__title">Welcome to Travelgem</h3>
            <p class="form-box__description ">Let's travel together.</p>
        </div>
        <div class="form-box__container">
            <form action="{{ route('login') }}" method="POST" class="form-box__form"> 
                @csrf
                <div class="form-box__errors">
                    @error('email')
                    <div class="form-box__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @error('password')
                    <div class="form-box__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <input type="text" placeholder="Email" name="email" class="input input--large">
                <input type="password" placeholder="Password" name="password" class="input input--large">
                <div class="form-box__remember">
                    <input type="checkbox" name="remember">
                    <label for="rememner">Remember me</label>
                </div>
                <button class="btn btn--large">Login</button>
            </form>
        </div>
        <div class="form-box__register">
            <p class="form-box__description">Don't have an account?</p>
            <a href="/register" class="btn btn--large btn--reversed">Sign up</a>
        </div>
    </div>
</div>
    
@endsection