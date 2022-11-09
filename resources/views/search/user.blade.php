<li>
    <a href="/users/{{$user->id}}" class="user--small">
        <div class="user-img">
            @if($user->user_img)
            <img class="user-img__img" src="{{ asset('storage/user_images/' . $user->user_img) }}"
                alt="{{$user->user_img}}">
            @else
            <img class="user-img__img" src="{{ asset('storage/user_images/user.jpg') }}" alt="user.jpg">
            @endif
        </div>
        <p class="user__username">{{$user->username}}</p>
    </a>
</li>
