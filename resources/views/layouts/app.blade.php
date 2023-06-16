<!DOCTYPE html>
<html>
<head>
    <title>Trung Phát Travel - @yield('title')</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="/ckeditor/ckeditor.js"></script>
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
        <a href="/admin">Home</a>
    @show

    <div class="container">
        @yield('content')
    </div>
</body>
</html>