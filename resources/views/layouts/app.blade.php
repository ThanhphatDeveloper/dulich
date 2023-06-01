<!DOCTYPE html>
<html>
<head>
    <title>Tour Du Lịch - @yield('title')</title>
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    @section('header')
        @auth
            Chào {{Auth::user()->ho}} {{Auth::user()->ten}}
            
            <form method="post"
                action="{{route('logout')}}">
                @csrf
                <input type="submit" value="Đăng xuất">
            </form>
        @endauth
        @guest
            <a href="{{route('login')}}">Đăng nhập</a><br>  
        @endguest
        <br>
        <a href="/">Home</a>
    @show

    <div class="container">
        @yield('content')
    </div>
</body>
</html>