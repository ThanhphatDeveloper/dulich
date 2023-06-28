@extends('layouts.app')

@section('title', 'Add User')

@section('header')
    @parent
    <a href="{{route('users.index');}}">Users</a>
    <li class="breadcrumb-item active">Thêm tài khoản</li>
@endsection

@section('content')
    <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
        @csrf
        
        <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-table"></i> Thêm tài khoản </div>
            <div class="card-body">
            <div class="table-responsive">
                <table>
                    <tbody>
                        <tr>
                            <td>Họ: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input name="ho" value="{{old('ho')}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td> <p class="text-danger">@if($errors->has('ho')) {{$errors->first('ho')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Tên: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input name="ten" value="{{old('ten')}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td> <p class="text-danger">@if($errors->has('ten')) {{$errors->first('ten')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Email: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input name="email" value="{{old('email')}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td> <p class="text-danger">@if($errors->has('email')) {{$errors->first('email')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Số điện thoại: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input name="sdt" value="{{old('sdt')}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td> <p class="text-danger">@if($errors->has('sdt')) {{$errors->first('sdt')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Mật khẩu: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input type="password" name="password" value="{{old('password')}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td><p class="text-danger">@if($errors->has('password')) {{$errors->first('password')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Vai trò: </td>
                            <td>
                                <select class="custom-select custom-select-sm" name="admin">
                                    <option value='1'>admin cấp 1</option>
                                    <option value='0'>admin cấp 2</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Ảnh đại diện: </td>
                            <td>
                                <div class="custom-file">
                                    <input class="custom-file-input" id="ful_img" type="file" accept="image/*" name="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </td>
                            <td><p class="text-danger">@if($errors->has('image')) {{$errors->first('image')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td><img id="img_upload" style="width:100px;max-height:100px;object-fit:contain;"></td>
                        </tr>
                        
                        <tr>
                            <td><button id="btn-submit" type="submit" class="btn btn-primary">Thêm</button></td>
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

    <script>
        document.getElementById('ful_img').onchange = function (e) {
            document.getElementById('img_upload').src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection
