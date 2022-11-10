<!DOCTYPE html>
<html lang='nl'>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - TravelGem</title>
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2ab532272c.js" crossorigin="anonymous"></script>
</head>
 
<body>
    @section('header')
    <header class="header">
        <div class="header__container"> 
            <a href="/home"><img class="logo logo--header" src="{{ asset('storage/logo/travelgem_logo.svg') }}" alt="travelgem_logo.svg"></a>
            <div class="header__search">
                <form action="{{url('/search')}}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="input input--large" placeholder="search" name="search">
                </form>
            </div>
            <div class="header__navigation-box">
                <ul class="header__navigation">
                    <li>
                        <a href="/search">
                            <div class="header__link header__link--icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/home">
                            <p class="header__link header__link--text" data-nav="home">Explore</p>
                            <div class="header__link header__link--icon">
                                <i class="fa-solid fa-compass"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/travel">
                            <p class="header__link header__link--text" data-nav="travel">Travel</p>
                            <div class="header__link header__link--icon">
                                <i class="fa-solid fa-plane"></i>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="header__user">
                    <div class="user-img user-img--header">
                        @if($user->user_img)
                        <img class="user-img__img" src="{{ asset('storage/user_images/' . $user->user_img) }}" alt="{{$user->user_img}}">
                        @else
                        <img class="user-img__img"  src="{{ asset('storage/user_images/user.jpg') }}" alt="user.jpg">
                        @endif
                    </div>
                    <div class="user-options user-options--hide">
                        <ul class="user-options__list">
                            <li><a href="/user"><i class="fa-solid fa-circle-user"></i> Profile</a></li>
                            <li><a href="/user/settings"><i class="fa-solid fa-gear"></i> Settings</a></li>
                            @if($user->role_id === "2")
                            <li><a href="/admin"><i class="fa-solid fa-database"></i> Database</a></li>
                            @endif
                            <li><a href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @show

    <div class="content">
    @yield('content')
    </div>
    @yield('script')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
