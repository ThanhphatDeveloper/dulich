@extends('layouts.app')

@section('title', 'Sửa khuyến mãi')

@section('header')
    @parent
    <a href="{{route('khuyenmais.index');}}">Khuyến mãi</a>
    <li class="breadcrumb-item active">Chỉnh sửa khuyến mãi</li>
@endsection

@section('content')
    <form method="post" action="{{route('khuyenmais.update',['khuyenmai'=>$k])}}">
        @csrf
        @method('PUT')
        
        <input id="makhuyenmai" type="hidden" name="makhuyenmai" value="">
        <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-table"></i> Chỉnh sửa khuyến mãi </div>
            <div class="card-body">
            <div class="table-responsive">
                <table>
                    <tbody>
                        <tr>
                            <td>Mã khuyến mãi: </td>
                            <td><h5>{{$k->makhuyenmai}}</h5></td>
                        </tr>

                        <tr>
                            <td>Mô tả khuyến mãi: </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <div class="form-group">
                                    <textarea name="mota" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('mota', $k->mota)}}</textarea>
                                </div>
                            </td>
                            <td> <p class="text-danger">@if($errors->has('mota')) {{$errors->first('mota')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Mức giảm: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input id="number" type="number" name="mucgiam" value="{{old('mota', $k->mucgiam)}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td><p class="text-danger">@if($errors->has('mucgiam')) {{$errors->first('mucgiam')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Giá tối thiểu: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input id="number" type="number" name="giatoithieu" value="{{old('giatoithieu', $k->giatoithieu)}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td><p class="text-danger">@if($errors->has('giatoithieu')) {{$errors->first('giatoithieu')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Số lần sử dụng: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input id="number" type="number" name="hansudung" value="{{old('hansudung', $k->hansudung)}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td><p class="text-danger">@if($errors->has('hansudung')) {{$errors->first('hansudung')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Trạng thái: </td>
                            <td>
                                <select class="custom-select custom-select-sm" name="trangthai">
                                    <option value='1' @if ($k->trangthai==1) selected @endif>Hoạt động</option>
                                    <option value='0' @if ($k->trangthai==0) selected @endif>Ngừng hoạt động</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Cập nhật
                                </button>
                            </td>
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