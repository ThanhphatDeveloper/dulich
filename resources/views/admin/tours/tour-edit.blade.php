@extends('layouts.app')

@section('title', 'Edit Tour')

@section('header')
    @parent
    <a href="{{route('tours.index');}}">Tours</a>
    <li class="breadcrumb-item active">Chỉnh sửa tour</li>
@endsection

@section('content')
    <form method="post" action="{{route('tours.update', ['tour'=>$t])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
                                    <input name="tentour" value="{{old('tentour', $t->tentour)}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td>@if($errors->has('tentour')) {{$errors->first('tentour')}} @endif</td>
                        </tr>
                        <tr>
                            <td>Loại tour: </td>
                            <td>
                                <select class="custom-select" name="loaitour">
                                    @foreach($lst_loai_tour as $cat)
                                        <option value="{{$cat->id}}" @if($t->loai_tour_id==old('loaitour',$cat->id))
                                        selected @endif> {{$cat->loaitour}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Điểm khởi hành: </td>
                            <td>
                                <select class="custom-select" name="dkh">
                                    @foreach($lst_dd as $d)
                                        <option value="{{$d->id}}" @if($t->dia_diem_khoi_hanh_id==old('dkh',$d->id))
                                            selected @endif> {{$d->diadiem}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Điểm kết thúc: </td>
                            <td>
                                <select class="custom-select" name="dkt">
                                    @foreach($lst_dd as $d)
                                        <option value="{{$d->id}}" @if($t->dia_diem_ket_thuc_id==old('dkt',$d->id))
                                            selected @endif> {{$d->diadiem}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nhà cung cấp: </td>
                            <td>
                                <select class="custom-select" name="ncc">
                                    @foreach($lst_ncc as $n)
                                        <option value="{{$n->id}}" @if($t->nha_cung_cap_id==old('ncc',$n->id))
                                        selected @endif> {{$n->nhacungcap}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Thời gian: </td>
                            <td>
                                <div class="input-group input-group-sm mb-3">
                                    <input id="ngay" name="ngay" value="{{old('ngay', $lst_tg->songay)}}" type="number" name="gia" value="{{old('gia')}}" class="form-control" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Ngày</span>
                                    </div>
                                    <input id="dem" name="dem" value="{{old('dem', $lst_tg->sodem)}}" type="number" name="gia" value="{{old('gia')}}" class="form-control" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Đêm</span>
                                    </div>
                                </div>
                            </td>
                            <td><div id="noti_locate"></div></td>
                        </tr>
                        <tr>
                            <td>Giá: </td>
                            <td>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="number" name="gia" value="{{old('gia', $t->gia)}}" class="form-control" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">VNĐ</span>
                                    </div>
                                </div>
                            </td>
                            <td>@if($errors->has('gia')) {{$errors->first('gia')}} @endif</td>
                        </tr>
                        <tr>
                            <td>Mô tả:</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <textarea rows="8" id="editor" class="form-control" name="mota" rows="4" cols="50" value="{{old('mota')}}">
                                    {!!old('mota', $t->mota)!!}
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>@if($errors->has('mota')) {{$errors->first('mota')}} @endif</td>
                        </tr>
                        <tr>
                            <td>Ngày khởi hành: </td>
                            <td>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="datetime-local" name="nkh" value="{{old('nkh', $t->ngaykhoihanh)}}">
                                </div>
                            </td>
                            <td>@if($errors->has('nkh')) {{$errors->first('nkh')}} <br> @endif</td>
                        </tr>
                        <tr>
                            <td>Phương tiện: </td>
                            <td>
                                <select class="custom-select" name="phuongtien">
                                    <option value='Xe khách' @if ($t->phuongtien=='Xe khách') selected @endif>Xe khách</option>
                                    <option value='Máy bay' @if ($t->phuongtien=='Máy bay') selected @endif>Máy bay</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><button onclick="return checkUpdate()" id="btn-submit" type="submit" class="btn btn-primary">Cập nhật</button></td>
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

    <script>
        CKEDITOR.replace('editor');

        // $(document).ready(function () {
        
        // $("#btn-submit").click(function () {
        //     var ngay = $("#ngay").val();
        //     var dem = $("#dem").val();
        //     //console.log(ngay+' '+dem);
        //     if(ngay-dem==1&&ngay!=0&&dem!=0&&ngay<0&&dem<0 || ngay-dem==-1&&ngay!=0&&dem!=0&&ngay<0&&dem<0){
        //         $("#btn-submit").attr("type", "submit");
        //         $("#btn-submit").submit();
        //     }
        //     if(ngay-dem!=1 || ngay-dem!=-1 || ngay == null || dem == null){
        //         $("#noti_locate").text("Ngày đêm không hợp lệ");
        //     }
        //     });
        // });
    </script>
@endsection
