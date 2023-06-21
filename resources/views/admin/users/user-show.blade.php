@extends('layouts.app')

@section('title', 'Thông tin người dùng')

@section('header')
    @parent
    &gt; <a href="{{route('users.index');}}">Users</a>
@endsection

@section('content')
    <h1>{{$u->ho}} {{$u->ten}}</h1>
    <a href="{{route('users.edit', ['user'=>$u])}}">Sửa</a><br>
    <form method="post" action="{{route('users.destroy', ['user'=>$u])}}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Xóa">
    </form>
    <img style="width:300px;max-height:300px;object-fit:contain;" src="{{$u->image}}">
    <p>Email: {{$u->email}}</p>
    <p>Số điện thoại: {{$u->sdt}}</p>
    <p>Ngày đăng ký: {{$u->email_verified_at}}</p>
    <p>
        Chức năng: 
        @if ($u->admin == 1) admin cấp 1 @endif
        @if ($u->admin == 0) admin cấp 2 @endif
    </p>
    <p>
        Trạng thái:
        @if ($u->trangthai == 1) Hoạt động @endif
        @if ($u->trangthai == 0) Không hoạt động @endif
    </p>
    <br>
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