@extends('layouts.app')

@section('title', 'Home')

@section('header')
    @parent
@endsection

@section('content')
    @can('admin')
        <a href="{{route('users.index')}}">Danh sách user</a><br>
        <a href="{{route('loaitours.index')}}">Danh sách loại tour</a><br>
        <a href="{{route('tours.index')}}">Danh sách tour</a><br>
        <a href="{{route('diadiems.index')}}">Danh sách địa điểm</a><br>
        <a href="{{route('khuyenmais.index')}}">Danh sách khuyến mãi</a><br>
        <a href="{{route('nhacungcaps.index')}}">Danh sách nhà cung cấp</a><br>
        <a href="{{route('thanhtoans.index')}}">Danh sách thanh toán</a><br>
    @endcan
    <a href="{{route('donhangs.index')}}">Danh sách đơn hàng</a><br>
@endsection