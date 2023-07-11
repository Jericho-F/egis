<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <div class="navbar">
        <div class="btns container" id="nav">
            <ul>
                @guest
                    <li><a href="{{ url('/login') }}">Sign in</a></li>
                    <li><a href="{{ url('/register') }}">Sign up</a></li>
                @else
                    <li><a href="{{ route('edit-profile') }}">Edit Profile</a></li>
                    <li><a href="{{ route('showChangePass') }}">Change Password</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @endguest
            </ul>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>