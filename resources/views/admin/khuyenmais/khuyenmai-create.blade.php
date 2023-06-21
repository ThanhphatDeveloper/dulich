@extends('layouts.app')

@section('title', 'Thêm khuyến mãi')

@section('header')
    @parent
    &gt; <a href="{{route('khuyenmais.index');}}">Khuyến mãi</a>
    &gt; Thêm khuyến mãi
@endsection

@section('content')
    <form method="post" action="{{route('khuyenmais.store')}}">
        @csrf
        <input id="makhuyenmai" type="hidden" name="makhuyenmai" value="">
        <label>Mô tả khuyến mãi: </label><br>
        <textarea name="mota">{{old('mota')}}</textarea>
        <br>
        @if($errors->has('mota')) {{$errors->first('mota')}} <br> @endif

        <label>Mức giảm: </label><input type="number" name="mucgiam" value="{{old('mota')}}"><br>
        @if($errors->has('mucgiam')) {{$errors->first('mucgiam')}} <br> @endif

        <label>Giá tối thiểu: </label><input type="number" name="giatoithieu" value="{{old('giatoithieu')}}"><br>
        @if($errors->has('giatoithieu')) {{$errors->first('giatoithieu')}} <br> @endif

        <label>Số lần sử dụng: </label><input type="number" name="hansudung" value="{{old('hansudung')}}"><br>
        @if($errors->has('hansudung')) {{$errors->first('hansudung')}} <br> @endif
        
        <!-- Button trigger modal -->
        <button onclick="gfg_Run()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Tạo mã khuyến mãi
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Mã khuyến mãi của bạn là:
                    <p id="showmakhuyenmai"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu khuyến mãi</button>
                </div>
                </div>
            </div>
        </div>
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