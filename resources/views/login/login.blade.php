<html>

<head>
    <title>Login</title>
</head>

<body>
    <form method="post" action="{{route('login')}}">
        @csrf
        <label>Email: </label> <input name="email"><br>
        @if($errors->has('email')) {{$errors->first('email')}} <br> @endif
        <label>Password: </label> <input type="password" name="password"><br>
        @if($errors->has('password')) {{$errors->first('password')}} <br> @endif
        <label>Remember </label> <input type="checkbox" name="remamber"><br>
        <input type="submit">
    </form>
</body>

</html>