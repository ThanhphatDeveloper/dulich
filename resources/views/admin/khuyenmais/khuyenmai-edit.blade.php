@extends('layouts.app')

@section('title', 'Sửa khuyến mãi')

@section('header')
    @parent
    &gt; <a href="{{route('khuyenmais.index');}}">Khuyến mãi</a>
    &gt; Sửa khuyến mãi
@endsection

@section('content')
    <form method="post" action="{{route('khuyenmais.update',['khuyenmai'=>$k])}}">
        @csrf
        @method('PUT')
        <label>Mã khuyến mãi: </label> <h5>{{$k->makhuyenmai}}</h5>
        <label>Mô tả khuyến mãi: </label><br>
        <textarea name="mota">{{old('mota', $k->mota)}}</textarea><br>
        @if($errors->has('mota')) {{$errors->first('mota')}} <br> @endif

        <label>Mức giảm: </label> <input type="number" name="mucgiam" value="{{old('mucgiam', $k->mucgiam)}}"><br>
        @if($errors->has('mucgiam')) {{$errors->first('mucgiam')}} <br> @endif

        <label>Giá tối thiểu: </label> <input type="number" name="giatoithieu" value="{{old('mucgiam', $k->giatoithieu)}}"><br>
        @if($errors->has('giatoithieu')) {{$errors->first('giatoithieu')}} <br> @endif

        <label>Số lần sử dụng còn lại: </label> <input type="number" name="hansudung" value="{{old('mucgiam', $k->hansudung)}}"><br>
        @if($errors->has('hansudung')) {{$errors->first('hansudung')}} <br> @endif

        <label>Trạng thái: </label>
        <select name="trangthai">
            <option value='1' @if ($k->trangthai==1) selected @endif>Hoạt động</option>
            <option value='0' @if ($k->trangthai==0) selected @endif>Ngừng hoạt động</option>
        </select><br>
        
        <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>

    </form>
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