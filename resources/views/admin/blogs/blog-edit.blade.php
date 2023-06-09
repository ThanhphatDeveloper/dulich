@extends('layouts.app')

@section('title', 'Chỉnh sửa blog')

@section('header')
    @parent
    <a href="{{route('blogs.index');}}">Blog</a>
    <li class="breadcrumb-item active"> Chỉnh sửa blog</li>
@endsection

@section('content')
    <form method="post" action="{{route('blogs.update', ['blog'=>$blog])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-table"></i> Thêm blog </div>
            <div class="card-body">
            <div class="table-responsive">
                <table>
                    <tbody>
                        <tr>
                            <td>Tiêu đề: </td>
                            <td>
                                <div class="input input-group-sm">
                                    <input name="tieude" value="{{old('tieude', $blog->tieude)}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td> <p class="text-danger">@if($errors->has('tieude')) {{$errors->first('tieude')}} @endif</p></td>
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
                            <td>Nội dung: </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <textarea rows="8" id="editor" class="form-control" name="noidung" rows="4" cols="50">
                                    {{old('noidung', $blog->noidung)}}
                                </textarea>
                            </td>
                        </tr>

                        <tr>
                            <td><p class="text-danger">@if($errors->has('noidung')) {{$errors->first('noidung')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td>Tác giả: </td>
                            <td>
                                <select class="custom-select" name="tacgia">
                                    @foreach($lst as $n)
                                        <option value="{{$n->id}}" @if($blog->user_id==old('tacgia',$n->id))
                                        selected @endif> {{$n->ho}} {{$n->ten}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Trạng thái: </td>
                            <td>
                                <select class="custom-select" name="trangthai">
                                    <option value="1" @if ($blog->trangthai==1) selected @endif>Hoạt động</option>
                                    <option value="0" @if ($blog->trangthai==0) selected @endif>Ngừng hoạt động</option>
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

    <script>
        CKEDITOR.replace('editor');
        document.getElementById('ful_img').onchange = function (e) {
            document.getElementById('img_upload').src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection
