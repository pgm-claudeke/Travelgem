@extends('layouts.app')

@section('content')
<section class="section">
    <div class="form-box form-box--post">
        <div class="form-box__title-box">
            <h3 class="form-box__title">Create new post</h3>
            <p class="form-box__description">A new adventure to share.</p>
        </div>
        <div class="form-box__container form-box__container--add">
            <form action="{{url('/store-post')}}" method="post" class="form-box__form" enctype="multipart/form-data">
                @csrf
                <div class="input__label">
                    <label class="input__label" for="image">Image</label>
                    <input type="file" name="image" class="input--file" required>
                </div>
                <div class="input__label">
                    <label class="input__label" for="country">Country</label>
                    <input type="text" placeholder="Country of post" name="country" class="input input--large" required>
                </div>
                <div class="input__label">
                    <label class="input__label" for="city">City</label>
                    <input type="text" placeholder="City of post" name="city" class="input input--large" required>
                </div>
                <div class="input__label">
                    <label class="input__label" for="title">Title</label>
                    <input type="text" placeholder="Title of your post" name="title" class="input input--large"
                        required>
                </div>
                <div class="input__label"> 
                    <label class="input__label" for="description">Description</label>
                    <textarea class="input input--large  input--text" name="description"
                        placeholder="Describe your adventure..." cols="30" rows="10" required></textarea>
                </div>
                <div class="input__label">
                    <label for="tags">Tags</label>
                    <div class="input__tags">
                        @foreach($tags as $tag)
                        <div>
                            <input type="checkbox" value="{{$tag->id}}" id="tags" name="tags[]">
                            <label for="">{{$tag->name}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn--large" type="submit">Post</button>
        </form>
    </div>
    </div>
</section>

@endsection
