@extends('layouts.app')

@section('title', 'Danh sách khuyến mãi')

@section('header')
    @parent
    <a href="{{route('khuyenmais.index');}}">Khuyến mãi</a>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách khuyến mãi</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="{{route('khuyenmais.create')}}">
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    Thêm khuyến mãi
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
                    <th>Mã khuyến mãi</th>
                    <th>Mô tả</th>
                    <th>Mức giảm</th>
                    <th>Giá tối thiểu</th>
                    <th>Số lần sử dụng còn lại</th>
                    <th>Trạng thái</th>
                    <th>Xóa/Khôi phục</th>
                    <th>Chỉnh sửa</th>
                </tr>
              </thead>
              <tbody>
                @foreach($lst as $k)
                    <tr>
                        <td>{{$k->makhuyenmai}}</td>
                        <td>{{$k->mota}}</td>
                        <td>{{$k->mucgiam}}</td>
                        <td>{{$k->giatoithieu}}</td>
                        <td>{{$k->hansudung}}</td>
                        <td>
                            @if($k->trangthai == 0)
                                <span class="badge badge-danger">Ngừng hoạt động</span>
                            @else
                                <span class="badge badge-success">Hoạt động</span>
                            @endif
                        </td>
                        <td>
                            @if($k->trangthai == 0)
                                <form method="post" action="{{route('khuyenmais.update', ['khuyenmai'=>$k])}}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="restore" value="1">
                                    <button type="submit" onclick="return checkRestore()" class="btn btn-sm btn-info">
                                        <i class="fas fa-arrow-circle-left"></i>
                                    </button>
                                </form>
                            @else
                                <form method="post" action="{{route('khuyenmais.destroy', ['khuyenmai'=>$k])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return checkDelete()" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <form method="get" action="{{route('khuyenmais.edit', ['khuyenmai'=>$k])}}">
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
                {{$lst->appends(request()->all())->links()}}
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
@endsection
