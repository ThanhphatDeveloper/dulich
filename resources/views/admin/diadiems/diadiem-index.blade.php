@extends('layouts.app')

@section('title', 'Danh sách địa điểm')

@section('header')
    @parent
    <a href="{{route('diadiems.index');}}">Địa điểm</a>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách địa điểm</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Thêm địa điểm
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
                    <th>Địa điểm</th>
                    <th>Trạng thái</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($lst as $d)
                <tr>
                    <td>{{$d->diadiem}}</td>
                    <td>
                        @if($d->trangthai == 0)
                            <span class="badge badge-danger">Ngừng hoạt động</span>
                        @else
                            <span class="badge badge-success">Hoạt động</span>
                        @endif
                    </td>
                    <td>
                        <form method="post" action="{{route('diadiems.destroy', ['diadiem'=>$d])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return checkDelete()" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="get" action="{{route('diadiems.edit', ['diadiem'=>$d])}}">
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
                <h5 class="modal-title" id="exampleModalLabel">Thêm địa điểm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="store" method="post" action="{{route('diadiems.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input id="data" placeholder="Địa điểm" name="diadiem" value="{{old('diadiem')}}" type="text" class="form-control"><br>
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

    <!-- Modal delete-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn chắc chắn muốn xóa
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="save" type="button" class="btn btn-primary">Xóa</button>
            </div>
            </div>
        </div>
    </div>

    <script src="{{asset('vendor/jquery/jquery.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
        
            $("#save").click(function () {
                var array = @json($diadiem);
                var data = $("#data").val().trim();
                if(data==''){
                    $("#noti").text('Địa điểm trống');
                    return;
                }
                for(i=0;i<array.length;i++){
                    if(array[i].diadiem==data){
                        $("#noti").text('Địa điểm đã tồn tại');
                        return;
                    }
                }
                $('#store').submit();
            });
        }); 

    </script>
@endsection
