<li class="table__row">
    <div class="table__info table__info--short">{{$userData->id}}</div>
    <div class="table__info table__info--mid-long">{{$userData->username}}</div>
    <div class="table__info table__info--long">{{$userData->firstName}}</div>
    <div class="table__info table__info--long">{{$userData->lastName}}</div>
    <div class="table__info table__info--long">{{$userData->email}}</div>
    <div class="table__info table__info--medium">{{$userData->birthday}}</div>
    <div class="table__info table__info--short">
        <a href="/users/{{$userData->id}}" class="table__btn table__btn--link"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
    </div>
    <div class="table__info table__info--short">
        <form action="{{url('/admin/'. $userData->id .'/delete')}}" method="GET">
            <button class="table__btn table__btn--delete"><i class="fa-solid fa-trash-can"></i></button>
        </form>
    </div>
</li>
