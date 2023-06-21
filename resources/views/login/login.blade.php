<html>
    
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.7.0/css/all.css')}}"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login-page" style="background-image: url({{asset('assets/images/bg.jpg')}});">
        <div class="login-from-wrap">
            <form class="login-from" method="post" action="{{route('login')}}">
                @csrf
                <h1 class="site-title">
                    <a href="#">
                        <img src="{{asset('assets/images/logo.png')}}" alt="">
                    </a>
                </h1>
                <div class="form-group">
                    <label>User Name</label>
                    <input name="email" type="text" class="validate">
                </div>
                <div class="form-group">
                    <p class="text-danger">@if($errors->has('email')) {{$errors->first('email')}} @endif</p>
                </div>
                <div class="form-group">
                    <label for="last_name">Password</label>
                    <input name="password" id="last_name" type="password" class="validate">
                </div>
                <div class="form-group">
                    <p class="text-danger">@if($errors->has('password')) {{$errors->first('password')}} @endif</p>
                </div>
                <div class="form-group">
                    <button typr="submit" class="btn btn-info">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/js/canvasjs.min.js')}}"></script>
    <script src="{{asset('assets/js/counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('assets/js/dashboard-custom.js')}}"></script>
    <!-- <form method="post" action="{{route('login')}}">
        @csrf
        <label>Email: </label> <input name="email"><br>
        @if($errors->has('email')) {{$errors->first('email')}} <br> @endif
        <label>Password: </label> <input type="password" name="password"><br>
        @if($errors->has('password')) {{$errors->first('password')}} <br> @endif
        <label>Remember </label> <input type="checkbox" name="remamber"><br>
        <input type="submit">
    </form> -->
</body>

</html>