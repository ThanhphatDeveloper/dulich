@extends('layouts.app')

@section('title', 'Thêm Tour')

@section('header')
    @parent
    <a href="{{route('tours.index');}}">Tours</a>
    <li class="breadcrumb-item active">Thêm tour</li>
@endsection

@section('content')
    <form method="post" action="{{route('tours.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-table"></i> Thêm tour </div>
            <div class="card-body">
            <div class="table-responsive">
                <table>
                    <tbody>
                        <tr>
                            <td>Tên tour: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input name="tentour" value="{{old('tentour')}}" class="form-control" aria-describedby="basic-addon2">
                                    
                                </div>
                            </td>
                            <td><p class="text-danger">@if($errors->has('tentour')) {{$errors->first('tentour')}} @endif</p></td>
                        </tr>
                        <p class="text-danger"></p>
                        <tr>
                            <td>Loại tour: </td>
                            <td>
                                <select class="custom-select custom-select-sm" name="loaitour">
                                    @foreach($lst_loai_tour as $cat)
                                        <option value="{{$cat->id}}"> @if ($cat->id==old('loaitour'))
                                        @endif {{$cat->loaitour}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Điểm khởi hành: </td>
                            <td>
                                <select class="custom-select custom-select-sm" name="dkh">
                                    @foreach($lst_dd as $d)
                                        <option value="{{$d->id}}"> @if ($d->id==old('diadiem'))
                                            selected @endif {{$d->diadiem}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Điểm kết thúc: </td>
                            <td>
                                <select class="custom-select custom-select-sm" name="dkt">
                                    @foreach($lst_dd as $d)
                                        <option value="{{$d->id}}"> @if ($d->id==old('diadiem'))
                                        @endif {{$d->diadiem}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nhà cung cấp: </td>
                            <td>
                                <select class="custom-select custom-select-sm" name="ncc">
                                    @foreach($lst_ncc as $n)
                                        <option value="{{$n->id}}"> @if ($n->id==old('ncc'))
                                        @endif {{$n->nhacungcap}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Thời gian: </td>
                            <td>
                                <div class="input-group input-group-sm mb-3">
                                    <input id="ngay" name="ngay" value="{{old('ngay')}}" type="number" name="gia" value="{{old('gia')}}" class="form-control" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Ngày</span>
                                    </div>
                                    <input id="dem" name="dem" value="{{old('dem')}}" type="number" name="gia" value="{{old('gia')}}" class="form-control" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Đêm</span>
                                    </div>
                                </div>
                            </td>
                            <td><p id="noti_locate" class="text-danger"></p></td>
                        </tr>
                        <tr>
                            <td>Giá: </td>
                            <td>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="number" name="gia" value="{{old('gia')}}" class="form-control" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">VNĐ</span>
                                    </div>
                                </div>
                            </td>
                            <td><p class="text-danger">@if($errors->has('gia')) {{$errors->first('gia')}} @endif</p></td>
                        </tr>
                        <tr>
                            <td>Mô tả:</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <textarea rows="8" id="editor" class="form-control" name="mota" rows="4" cols="50" value="{{old('mota')}}">
                                    {{old('mota')}}
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><p class="text-danger">@if($errors->has('mota')) {{$errors->first('mota')}} @endif</p></td>
                        </tr>
                        <tr>
                            <td>Ngày khởi hành: </td>
                            <td>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="datetime-local" name="nkh" value="{{old('nkh')}}">
                                </div>
                            </td>
                            <td><p class="text-danger">@if($errors->has('nkh')) {{$errors->first('nkh')}} <br> @endif</p></td>
                        </tr>
                        <tr>
                            <td>Phương tiện: </td>
                            <td>
                                <select class="custom-select custom-select-sm" name="phuongtien">
                                    <option value='Xe khách'>Xe khách</option>
                                    <option value='Máy bay'>Máy bay</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><button id="btn-submit" type="button" class="btn btn-primary">Thêm</button></td>
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
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        table {
            border-collapse: separate;
            border-spacing:0 10px;
        }
    </style>
    <script src="{{asset('vendor/jquery/jquery.js')}}"></script>

    <script type="text/javascript">
        CKEDITOR.replace('editor');

        $(document).ready(function () {
        
        $("#btn-submit").click(function () {
            var ngay = $("#ngay").val();
            var dem = $("#dem").val();

            if(ngay-dem==1&&ngay!=0&&dem!=0 || ngay<0 || dem<0 || ngay-dem==-1&&ngay!=0&&dem!=0 || ngay<0 || dem<0){
                $("#btn-submit").attr("type", "submit");
            }

            if(ngay-dem!=1 || ngay-dem!=-1 || ngay == null || dem == null){
                $("#noti_locate").text("Ngày đêm không hợp lệ");
            }
            });
        });

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