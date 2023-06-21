@extends('layouts.app')

@section('title', 'Add User')

@section('header')
    @parent
    &gt; <a href="{{route('users.index');}}">Users</a>
    &gt; Thêm User
@endsection

@section('content')
    <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
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

@section('menu')
    @can('admin')

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('users.index')}}">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Quản lý tài khoản</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('loaitours.index')}}">
            <i class="fa fa-fw fa-pencil"></i>
            <span class="nav-link-text">Quản lý loại tour</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('tours.index')}}">
            <i class="fa fa-fw fa-globe"></i>
            <span class="nav-link-text">Quản lý tour</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('diadiems.index')}}">
            <i class="fa fa-fw fa-map-marker"></i>
            <span class="nav-link-text">Quản lý địa điểm</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('khuyenmais.index')}}">
            <i class="fa fa-fw fa-tags"></i>
            <span class="nav-link-text">Quản lý khuyến mãi</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('nhacungcaps.index')}}">
            <i class="fa fa-fw fa-id-card-o"></i>
            <span class="nav-link-text">Quản lý nhà cung cấp</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('thanhtoans.index')}}">
            <i class="fa fa-fw fa-credit-card-alt"></i>
            <span class="nav-link-text">Quản lý thanh toán</span>
        </a>
    @endcan

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('donhangs.index')}}">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span class="nav-link-text">Quản lý đơn hàng</span>
        </a>
@endsection