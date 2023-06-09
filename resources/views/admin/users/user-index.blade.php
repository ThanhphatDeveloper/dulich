@extends('layouts.app')

@section('title', 'Danh sách tài khoản')

@section('header')
    @parent
    <a href="{{route('users.index');}}">Tài khoản</a>
@endsection

@section('content')

    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách tài khoản </div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="{{route('users.create')}}">
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    Thêm tài khoản
                                </button>
                            </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <form class="" method="get" action="">
                            <div class="input-group float-right">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="key" value="{{old('key')}}" placeholder="Từ khóa" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>Ảnh đại diện</th>
                    <th>Email</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Xóa/Khôi phục</th>
                    <th>Chỉnh sửa</th>
                </tr>
              </thead>
              <tbody>
                @foreach($lst_users as $u)
                    <tr>
                        <td><img style="width:100px;max-height:100px;object-fit:contain;" src="{{$u->image}}"></td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->ho}} {{$u->ten}}</td>
                        <td>{{$u->sdt}}</td>
                        <td>
                            @if($u->trangthai == 0)
                                <span class="badge badge-danger">Ngừng hoạt động</span>
                            @else
                                <span class="badge badge-success">Hoạt động</span>
                            @endif
                        </td>
                        <td>
                            @if($u->trangthai == 0)
                                
                                    <form method="post" action="{{route('users.update', ['user'=>$u])}}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="restore" value="1">
                                        <button type="submit" onclick="return checkRestore()" class="btn btn-sm btn-info">
                                            <i class="fas fa-arrow-circle-left"></i>
                                        </button>
                                    </form>
                            @else
                                @if($u->id == Auth::user()->id)
                                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @else
                                    <form method="post" action="{{route('users.destroy', ['user'=>$u])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return checkDelete()" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </td>
                        <td>
                            <form method="get" action="{{route('users.edit', ['user'=>$u])}}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
              </tbody>
            </table>
            <div class="">
                {{$lst_users->appends(request()->all())->links()}}
            </div>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Tài khoản đang đăng nhập không thể xóa
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
        </div>
    </div>
    </div>
    
@endsection
