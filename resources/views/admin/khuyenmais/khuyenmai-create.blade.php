@extends('layouts.app')

@section('title', 'Thêm khuyến mãi')

@section('header')
    @parent
    <a href="{{route('khuyenmais.index');}}">Khuyến mãi</a>
    <li class="breadcrumb-item active">Thêm khuyến mãi</li>
@endsection

@section('content')
    <form method="post" action="{{route('khuyenmais.store')}}">
        @csrf

        <input id="makhuyenmai" type="hidden" name="makhuyenmai" value="">
        <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-table"></i> Thêm khuyến mãi </div>
            <div class="card-body">
            <div class="table-responsive">
                <table>
                    <tbody>
                        <tr>
                            <td>Mô tả khuyến mãi: </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <div class="form-group">
                                    <textarea name="mota" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('mota')}}</textarea>
                                </div>
                            </td>
                            <td> <p class="text-danger">@if($errors->has('mota')) {{$errors->first('mota')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Mức giảm: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input id="number" type="number" name="mucgiam" value="{{old('mota')}}" class="form-control mucgiam" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td>
                                <p id="noti_locate" class="text-danger">@if($errors->has('mucgiam')) {{$errors->first('mucgiam')}} @endif</p>
                            </td>
                        </tr>

                        <tr>
                            <td>Giá tối thiểu: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input id="number" type="number" name="giatoithieu" value="{{old('giatoithieu')}}" class="form-control giatoithieu" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td><p class="text-danger">@if($errors->has('giatoithieu')) {{$errors->first('giatoithieu')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Số lần sử dụng: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input id="number" type="number" name="hansudung" value="{{old('hansudung')}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td><p class="text-danger">@if($errors->has('hansudung')) {{$errors->first('hansudung')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>
                                <button id="check" onclick="gfg_Run()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Tạo mã khuyến mãi
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

    <style>

        table {
            border-collapse: separate;
            border-spacing:0 10px;
        }
    </style>
    <script src="{{asset('vendor/jquery/jquery.js')}}"></script>

    <script>

        $(document).ready(function () {
        
        $("#check").click(function () {
            var mucgiam = $(".mucgiam").val();
            var giatoithieu = $(".giatoithieu").val() * 0.7;
            if(mucgiam > giatoithieu){
                $("#check").attr("data-target", "error");
                $("#noti_locate").text("Mức giảm không quá 70% giá tối thiểu");
            }
            else{
                $("#check").attr("data-target", "#exampleModalCenter");
            }
            });
        });

        const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        function generateString(length) {
            let result = '';
            const charactersLength = characters.length;
            for ( let i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }

            return result;
        }

        var today = new Date();

        var string = today.getFullYear()+''+generateString(3)+''+(today.getMonth()+1)+''+generateString(3)+''+today.getDate()
        +''+generateString(3)+''+today.getHours()+''+generateString(3)+''+today.getMinutes()+''+generateString(3)
        +''+today.getSeconds();

        var el_down = document.getElementById("showmakhuyenmai");
        var inputF = document.getElementById("makhuyenmai");

        function gfg_Run() {
            inputF.value = string;
            el_down.innerHTML = string;
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