@extends('layouts.app')

@section('title', 'Blog du lịch')

@section('header')
    @parent
    <a href="{{route('blogs.index');}}">Blog</a>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Blog du lịch</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="{{route('blogs.create')}}">
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    Thêm blog mới
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
                    <th>Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Tour liên quan</th>
                    <th>Trạng thái</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($lst as $l)
                    <tr>
                        <td><img style="width:100px;max-height:100px;object-fit:contain;" src="{{$l->anhdaidien}}"></td>
                        <td>{{$l->tieude}}</td>

                        <td>
                            @foreach($lst_user as $u)
                                @if($l->user_id == $u->id)
                                    {{$u->ho}} {{$u->ten}}
                                @endif 
                            @endforeach
                        </td>

                        <td>
                            <form method="get" action="{{route('tourlienquans.index')}}">
                                <input type="hidden" name="id" value="{{$l->id}}">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </form>
                        </td>

                        <td>
                            @if($l->trangthai == 0)
                                <span class="badge badge-danger">Ngừng hoạt động</span>
                            @else
                                <span class="badge badge-success">Hoạt động</span>
                            @endif
                        </td>
                        <td>
                            <form method="post" action="{{route('blogs.destroy', ['blog'=>$l])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form method="get" action="{{route('blogs.edit', ['blog'=>$l])}}">
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