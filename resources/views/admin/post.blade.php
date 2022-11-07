<li class="table__row">
    <div class="table__info table__info--short">{{$post->id}}</div>
    <div class="table__info table__info--mid-long">
        <img class="table__img" src="{{ asset('storage/posts/' . $post->image) }}" alt="{{$post->image}}">
    </div>
    <div class="table__info table__info--medium">{{$post->country}}</div>
    <div class="table__info table__info--medium">{{$post->city}}</div>
    <div class="table__info table__info--mid-long">{{$post->title}}</div>
    <div class="table__info table__info--extra-long">{{substr($post->description, 0, 30)}}...</div>
    <div class="table__info table__info--medium">{{$post->username}}</div>
    <div class="table__info table__info--short"><a href="/post/{{ $post->id }}" class="table__btn table__btn--link"><i
                class="fa-solid fa-arrow-up-right-from-square"></i></a></div>
    <div class="table__info table__info--short">
        <form action="{{url('/admin/posts/'. $post->id . '/delete')}}" method="get">
            <button class="table__btn table__btn--delete"><i class="fa-solid fa-trash-can"></i></button>
        </form>
    </div>
</li>
