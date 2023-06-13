@extends('layouts.app')

@section('title', 'Thêm Tour')

@section('header')
    @parent
    &gt; <a href="{{route('tours.index');}}">Tours</a>
    &gt; Thêm tour
@endsection

@section('content')
    <form method="post" action="{{route('tours.store')}}" enctype="multipart/form-data">
        @csrf
        <label>Họ: </label><input name="ho" value="{{old('ho')}}"><br>
        @if($errors->has('ho')) {{$errors->first('ho')}} <br> @endif
        <label>Tên: </label><input name="ten" value="{{old('ten')}}"><br>
        @if($errors->has('ten')) {{$errors->first('ten')}} <br> @endif

        <label>Email: </label><input name="email" value="{{old('email')}}"><br>
        @if($errors->has('email')) {{$errors->first('email')}} <br> @endif

        <label>Số điện thoại: </label><input name="sdt" value="{{old('sdt')}}"><br>
        @if($errors->has('sdt')) {{$errors->first('sdt')}} <br> @endif

        <label>Mật khẩu: </label><input type="password" name="password" value="{{old('password')}}"><br>
        @if($errors->has('password')) {{$errors->first('password')}} <br> @endif

        <label>Vai trò: </label>
        <select name="admin">
            <option value='1'>admin cấp 1</option>
            <option value='0'>admin cấp 2</option>
        </select><br>

        
        <label>Ảnh đại diện: </label><input id="ful_img" type="file" accept="image/*" name="image"><br>
        @if($errors->has('image')) {{$errors->first('image')}} <br> @endif
        <img id="img_upload" style="width:100px;max-height:100px;object-fit:contain;"><br>

        <input type="submit">
    </form>

    <script>
        document.getElementById('ful_img').onchange = function (e) {
            document.getElementById('img_upload').src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection