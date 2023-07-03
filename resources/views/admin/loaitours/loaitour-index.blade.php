@extends('layouts.app')

@section('title', 'Danh sách loại tour')

@section('header')
    @parent
    <a href="{{route('loaitours.index');}}">Loại tour</a>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách loại tour</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2" >
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Thêm loại tour
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
                    <th>Loại tour</th>
                    <th>Trạng thái</th>
                    <th>Xóa/Khôi phục</th>
                    <th>Chỉnh sửa</th>
                </tr>
              </thead>
              <tbody>
                @foreach($lst as $l)
                    <tr>
                        <td>{{$l->loaitour}}</td>
                        <td>
                            @if($l->trangthai == 0)
                                <span class="badge badge-danger">Ngừng hoạt động</span>
                            @else
                                <span class="badge badge-success">Hoạt động</span>
                            @endif
                        </td>
                        <td>
                            @if($l->trangthai == 0)
                                <form method="post" action="{{route('updatestatus_loaitour')}}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$l->id}}">
                                    <button type="submit" onclick="return checkRestore()" class="btn btn-sm btn-info">
                                        <i class="fas fa-arrow-circle-left"></i>
                                    </button>
                                </form>
                            @else
                                <form method="post" action="{{route('loaitours.destroy', ['loaitour'=>$l])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return checkDelete()" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <form method="get" action="{{route('loaitours.edit', ['loaitour'=>$l])}}">
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
                <h5 class="modal-title" id="exampleModalLabel">Thêm loại tour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="store" method="post" action="{{route('loaitours.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input id="data" placeholder="Loại tour" name="loaitour" value="{{old('loaitour')}}" type="text" class="form-control"><br>
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

    <script type="text/javascript">

        $(document).ready(function () {
        
            $("#save").click(function () {
                var array = @json($loaitour);
                var data = $("#data").val().trim();
                if(data==''){
                    $("#noti").text('Loại tour trống');
                    return;
                }
                for(i=0;i<array.length;i++){
                    if(array[i].loaitour==data){
                        $("#noti").text('Loại tour đã tồn tại');
                        return;
                    }
                }
                $('#store').submit();
            });
        });

    </script>
@endsection
