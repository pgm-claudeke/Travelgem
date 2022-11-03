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
    <header class="header_box">
        <div class="logo_box"> 
            <a href="/home">
            <img class="header__logo" src="{{ asset('storage/logo/travelgem_logo.svg') }}" alt="travelgem_logo.svg">
            </a>
        </div>
        <div class="search_box">
            <form action="" method="get">
                <input type="text" class="input input--search" placeholder="search">
            </form>
        </div>
        <div class="navigation_box">
            <ul class="navigation">
                <li><a href="/home">Explore</a></li>
                <li><a href="/travel">Travel</a></li>
            </ul>
            <div class="navigation__user">
                <div class="profile_box">
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
    </header>
    @show

    <div class="content">
    @yield('content')
    </div>
    @yield('script')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
