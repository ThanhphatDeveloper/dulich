@extends('layouts.app')

@section('title', 'Sửa địa điểm')

@section('header')
    @parent
    <a href="{{route('diadiems.index');}}">Địa điểm</a>
    <li class="breadcrumb-item active">Chỉnh sửa địa điểm</li>
@endsection

@section('content')
    <form method="post" action="{{route('diadiems.update',['diadiem'=>$d])}}">
        @csrf
        @method('PUT')
        
        <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-table"></i> Chỉnh sửa địa điểm </div>
            <div class="card-body">
            <div class="table-responsive">
                <table>
                    <tbody>
                        <tr>
                            <td>Địa điểm: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input name="diadiem" value="{{old('diadiem', $d->diadiem)}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td> <p class="text-danger">@if($errors->has('diadiem')) {{$errors->first('diadiem')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Trạng thái: </td>
                            <td>
                                <select class="custom-select custom-select-sm" name="trangthai">
                                    <option value="1" @if ($d->trangthai==1) selected @endif>Hoạt động</option>
                                    <option value="0" @if ($d->trangthai==0) selected @endif>Ngừng hoạt động</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><button id="btn-submit" type="submit" class="btn btn-primary">Cập nhật</button></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
            </div>
        </div>
        <!-- /tables-->
        </div>
        <!-- /container-fluid-->
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
        </a>
    </form>
    <style>

        table {
            border-collapse: separate;
            border-spacing:0 10px;
        }
    </style>
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