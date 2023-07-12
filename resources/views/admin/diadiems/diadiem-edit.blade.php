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
                                <select class="custom-select" name="trangthai">
                                    <option value="1" @if ($d->trangthai==1) selected @endif>Hoạt động</option>
                                    <option value="0" @if ($d->trangthai==0) selected @endif>Ngừng hoạt động</option>
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
