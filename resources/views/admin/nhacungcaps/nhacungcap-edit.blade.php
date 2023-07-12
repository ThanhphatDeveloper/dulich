@extends('layouts.app')

@section('title', 'Chỉnh sửa nhà cung cấp')

@section('header')
    @parent
    <a href="{{route('nhacungcaps.index');}}">Nhà cung cấp</a>
    <li class="breadcrumb-item active">Chỉnh sửa nhà cung cấp</li>
@endsection

@section('content')
    <form method="post" action="{{route('nhacungcaps.update',['nhacungcap'=>$n])}}">
        @csrf
        @method('PUT')
        
        <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-table"></i> Chỉnh sửa nhà cung cấp </div>
            <div class="card-body">
            <div class="table-responsive">
                <table>
                    <tbody>
                        <tr>
                            <td>Địa điểm: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input name="nhacungcap" value="{{old('nhacungcap', $n->nhacungcap)}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td> <p class="text-danger">@if($errors->has('nhacungcap')) {{$errors->first('nhacungcap')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Trạng thái: </td>
                            <td>
                                <select class="custom-select" name="trangthai">
                                    <option value="1" @if ($n->trangthai==1) selected @endif>Hoạt động</option>
                                    <option value="0" @if ($n->trangthai==0) selected @endif>Ngừng hoạt động</option>
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

        table {
            border-collapse: separate;
            border-spacing:0 10px;
        }
    </style>
@endsection
