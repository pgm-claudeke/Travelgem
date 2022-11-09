<li class="card card--post">
    <a href="/post/{{ $post->id }}">
        <div class="card__container">
            <img class="card__img" src="{{ asset('storage/posts/'. $post->image) }}" alt="{{$post->image}}">
        </div>
        <div class="card__info">
            <p class="card__title">{{$post->title}}</p>
            <div class="card__location">
                <i class="fa-solid fa-location-dot icon"></i>
                <p>{{$post->country}}, {{$post->city}}</p>
            </div>
        </div>
    </a>
</li>
