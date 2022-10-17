@extends('layouts.app')

@section('content')
<section class="section">
    <div class="form-box">
        <div class="form-box__title-box">
            <h3 class="form-box__title">Create new post</h3>
            <p class="form-box__description">A new adventure.</p>
        </div>
        <div class="form-box__container form-box__container--add">
            <form action="{{ route('register') }}" method="POST" class="form-box__form">
                @csrf

                <div class="form-box__errors">
                    @error('name')
                    <div class="form-box__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @error('lastname')
                    <div class="form-box__error"> 
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @error('email')
                    <div class="form-box__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @error('birthday')
                    <div class="form-box__error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @error('username')
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

                <div class="input__label">
                    <label class="input__label" for="birthday">Image</label>
                    <input id="image" type="file" name="image" class="input input--large input--file">
                </div>
                <div class="input__label">
                    <label class="input__label" for="country">Country</label>
                    <input id="country" type="text" placeholder="Country of post" name="country" class="input input--large">
                </div>
                <div class="input__label">
                    <label class="input__label" for="city">City</label>
                    <input id="city" type="text" placeholder="City of post" name="city" class="input input--large">
                </div>
                <div class="input__label">
                    <label class="input__label" for="title">Title</label>
                    <input id="title" type="text" placeholder="Title of your post" name="title" class="input input--large">
                </div>
                <div class="input__label">
                    <label class="input__label" for="description">Description</label>
                    <textarea class="input input--large  input--text" name="" id="description" cols="30" rows="10"></textarea>
                </div>
                <button class="btn btn--large" type="submit">Post</button>
            </form>
        </div>
    </div>
</section>
    
@endsection