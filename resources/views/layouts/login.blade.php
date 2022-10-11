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
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
