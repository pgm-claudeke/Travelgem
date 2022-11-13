@extends('layouts.auth')

@section('title', 'register')

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
            <h3 class="container__title container__title--center">Create an account</h3>
            <p class="container__description container__description--center">Let's travel together.</p> 
        </div>
        <div class="form--auth form--login">
            <form action="{{ route('register') }}" method="POST" class="form form--auth">
                @csrf
                <div class="form__errors">
                    @error('name')
                    <div class="form__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @error('lastname')
                    <div class="form__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @error('email')
                    <div class="form__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @error('birthday')
                    <div class="form__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @error('username')
                    <div class="form__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @error('password')
                    <div class="form__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form__row">
                    <input id="firstname" type="text" placeholder="Name" name="firstname" class="input input--medium" value="{{ old('name') }}">
                    <input id="lastname" type="text" placeholder="Lastname" name="lastname" class="input input--medium" value="{{ old('lastname') }}">
                </div>
                <input id="email" type="email" placeholder="Email" name="email" class="input input--large">
                <div class="input__label">
                    <label class="input__label" for="birthday">Date of birth</label>
                    <input id="birthday" type="date" name="birthday">
                </div>
                <input id="username" type="text" placeholder="Username" name="username" class="input input--large">
                <input id="passoword" type="password" placeholder="Password" name="password" class="input input--large">
                <input id="passoword-confirm" type="password" placeholder="Password confirmation" name="password_confirmation" class="input input--large">
                <button class="btn btn--large" type="submit">Sign up</button>
            </form>
        </div>
        <div class="form--auth">
            <p class="form__description">Already have an account?</p>
            <a href="/login" class="btn btn--large btn--reversed">Login</a>
        </div>
    </div>
</section>
    
@endsection