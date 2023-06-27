@extends('layouts.app')

@section('title', 'Danh sách ảnh tour')

@section('header')
    @parent
    <a href="{{route('tours.index');}}">Ảnh</a>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách hình ảnh</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <h5>{{$tour->tentour}}</h5>
                </div><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>Ảnh đại diện</th>
                    <th>Ảnh mô tả</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                        <td>
                            <img style="width:100px;max-height:100px;object-fit:contain;" src="/storage/{{$tour->avatar}}">
                        </td>
                        <td>
                            <img style="width:100px;max-height:100px;object-fit:contain;" src="/storage/{{$tour->imagelarge}}">
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#image">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
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

    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách hình ảnh liên quan</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Thêm</button>
                </div><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>Ảnh liên quan</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($lst as $i)
                    <tr>
                        
                        <td>
                            <img style="width:100px;max-height:100px;object-fit:contain;" src="/storage/{{$i->image}}">
                        </td>
                        <td>
                            <form method="post" action="{{route('imagetours.destroy', ['imagetour'=>$i])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
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

    <!-- Modal hình ảnh liên quan -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form method="post" action="{{route('imagetours.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file">
                        <input type="hidden" name="id" value="{{$tour->id}}">
                        <input class="custom-file-input" id="ful_img" type="file" accept="image/*" name="image"><br>
                        <label class="custom-file-label" for="customFile">Chọn ảnh</label><br>
                    </div>
                    <img id="img_upload" style="width:100px;max-height:100px;object-fit:contain;">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>

    <!-- Modal hình ảnh -->
    <div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form method="post" action="{{route('tours.update', ['tour'=>$tour])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <p>Ảnh đại diện (400x267)</p>
                    <div class="custom-file">
                        <input type="hidden" name="id" value="{{$tour->id}}">
                        <input class="custom-file-input" id="ful_img_modal" type="file" accept="image/*" name="image"><br>
                        <label class="custom-file-label" for="customFile">Chọn ảnh</label><br>
                    </div>
                    <img id="img_upload_modal" style="width:100px;max-height:100px;object-fit:contain;">

                    <p>Ảnh mô tả</p>
                    <div class="custom-file">
                        <input type="hidden" name="id" value="{{$tour->id}}">
                        <input class="custom-file-input" id="ful_img_modal" type="file" accept="image/*" name="image"><br>
                        <label class="custom-file-label" for="customFile">Chọn ảnh</label><br>
                    </div>
                    <img id="img_upload_modal" style="width:100px;max-height:100px;object-fit:contain;">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>

    <script>
        document.getElementById('ful_img').onchange = function (e) {
            document.getElementById('img_upload').src = URL.createObjectURL(e.target.files[0]);
        };

        document.getElementById('ful_img_modal').onchange = function (e) {
            document.getElementById('img_upload_modal').src = URL.createObjectURL(e.target.files[0]);
        };

        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

@endsection

@section('menu')
    @can('admin')

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('users.index')}}">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Quản lý tài khoản</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('loaitours.index')}}">
            <i class="fa fa-fw fa-pencil"></i>
            <span class="nav-link-text">Quản lý loại tour</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('tours.index')}}">
            <i class="fa fa-fw fa-globe"></i>
            <span class="nav-link-text">Quản lý tour</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('diadiems.index')}}">
            <i class="fa fa-fw fa-map-marker"></i>
            <span class="nav-link-text">Quản lý địa điểm</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('khuyenmais.index')}}">
            <i class="fa fa-fw fa-tags"></i>
            <span class="nav-link-text">Quản lý khuyến mãi</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('nhacungcaps.index')}}">
            <i class="fa fa-fw fa-id-card-o"></i>
            <span class="nav-link-text">Quản lý nhà cung cấp</span>
        </a>

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('thanhtoans.index')}}">
            <i class="fa fa-fw fa-credit-card-alt"></i>
            <span class="nav-link-text">Quản lý thanh toán</span>
        </a>
    @endcan

        <li class="nav-item" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="{{route('donhangs.index')}}">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span class="nav-link-text">Quản lý đơn hàng</span>
        </a>
@endsection
