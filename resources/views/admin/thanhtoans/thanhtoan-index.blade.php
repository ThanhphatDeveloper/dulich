@extends('layouts.app')

@section('title', 'Danh sách thanh toán')

@section('header')
    @parent
    &gt; <a href="{{route('thanhtoans.index');}}">Thanh toán</a>
@endsection

@section('content')
    <h1>Danh sách thanh toán</h1>

    <form method="get" action="">
        @csrf
        <input name="key" value="{{old('key')}}" placeholder="Từ khóa">
        <button type="submit">
            Tìm kiếm
        </button>
    </form>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Tên phương thức</th>
                <th>Số tiền</th>
                <th>Mã thanh toán</th>
                <th>Tên khách hàng</th>
                <th>Ngày thanh toán</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lst as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td>{{$t->tenphuongthuc}}</td>
                    <td>{{$t->sotien}}</td>
                    <td>{{$t->mathanhtoan}}</td>
                    <td>{{$t->tenkhachhang}}</td>
                    <td>{{$t->ngaythanhtoan}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <div class="">
        {{$lst->appends(request()->all())->links()}}
    </div>
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