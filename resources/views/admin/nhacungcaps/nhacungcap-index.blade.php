@extends('layouts.app')

@section('title', 'Danh sách nhà cung cấp')

@section('header')
    @parent
    <a href="{{route('nhacungcaps.index');}}">Nhà cung cấp</a>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách nhà cung cấp</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Thêm nhà cung cấp
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
                    <th>Nhà cung cấp</th>
                    <th>Trạng thái</th>
                    <th>Xóa/Khôi phục</th>
                    <th>Chỉnh sửa</th>
                </tr>
              </thead>
              <tbody>
              @foreach($lst as $d)
                <tr>
                    <td>{{$d->nhacungcap}}</td>
                    <td>
                        @if($d->trangthai == 0)
                            <span class="badge badge-danger">Ngừng hoạt động</span>
                        @else
                            <span class="badge badge-success">Hoạt động</span>
                        @endif
                    </td>
                    <td>
                        @if($d->trangthai == 0)
                            <form method="post" action="{{route('nhacungcaps.update', ['nhacungcap'=>$d])}}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="restore" value="1">
                                <button type="submit" onclick="return checkRestore()" class="btn btn-sm btn-info">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </button>
                            </form>
                        @else
                            <form method="post" action="{{route('nhacungcaps.destroy', ['nhacungcap'=>$d])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return checkDelete()" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                    <td>
                        <form method="get" action="{{route('nhacungcaps.edit', ['nhacungcap'=>$d])}}">
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

    <!-- Modal store-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm nhà cung cấp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="store" method="post" action="{{route('nhacungcaps.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input id="data" placeholder="Tên nhà cung cấp" name="nhacungcap" type="text" class="form-control" value="{{old('nhacungcap')}}"><br>
                    <p class="text-danger" id="noti"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button id="save" type="button" class="btn btn-primary">Lưu</button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <script src="{{asset('vendor/jquery/jquery.js')}}"></script>

    <script>
        
        $(document).ready(function () {
        
        $("#save").click(function () {
            var array = @json($ncc);
            var data = $("#data").val().trim();
            if(data==''){
                $("#noti").text('Tên nhà cung cấp trống');
                return;
            }
            for(i=0;i<array.length;i++){
                if(array[i].nhacungcap==data){
                    $("#noti").text('Tên nhà cung cấp đã tồn tại');
                    return;
                }
            }
            $('#store').submit();
        });
    });

    </script>
@endsection
