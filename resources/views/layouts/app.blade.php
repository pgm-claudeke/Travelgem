<!DOCTYPE html>
<html lang='nl'>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - TravelGem</title>
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
</head>

<body>
    @section('header')
    <header class="header_box">
        <div class="logo_box">
            <a href="/home">
                <p>TravelGem</p>
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
            <a href="/user">
                <div class="profile_box">
                
                </div>
            </a>
            
        </div>
    </header>
    @show

    <div class="content">
        @yield('content')
    </div>
</body>

</html>
