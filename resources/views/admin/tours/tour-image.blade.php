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
                            <img style="width:300px;max-height:300px;object-fit:contain;" src="/storage/{{$tour->avatar}}">
                        </td>
                        <td>
                            <img style="width:300px;max-height:300px;object-fit:contain;" src="/storage/{{$tour->imagelarge}}">
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
                            <img style="width:250px;max-height:250px;object-fit:contain;" src="/storage/{{$i->image}}">
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
                    <h5 class="modal-title" id="exampleModalLabel">Thêm ảnh liên quan</h5>
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
                        <label class="custom-file-label" for="customFile">Chọn ảnh (800x600)</label><br>
                    </div>
                    <img id="img_upload" style="width:200px;max-height:200px;object-fit:contain;">
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
                <form method="post" action="{{route('update_image')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file">
                        <input type="hidden" name="id" value="{{$tour->id}}">
                        <input class="custom-file-input" id="ful_img_modal" type="file" accept="avatar/*" name="avatar"><br>
                        <label class="custom-file-label" for="customFile">Ảnh đại diện (400x267)</label>
                    </div>
                    <img id="img_upload_modal" style="width:200px;max-height:200px;object-fit:contain;margin-bottom:30px;margin-top:15px;">

                    <div class="custom-file">
                        <input type="hidden" name="id" value="{{$tour->id}}">
                        <input class="custom-file-input" id="ful_img_modal1" type="file" accept="imagelarge/*" name="imagelarge"><br>
                        <label class="custom-file-label" for="customFile">Ảnh mô tả (1600x1067)</label>
                    </div>
                    <img id="img_upload_modal1" style="width:200px;max-height:200px;object-fit:contain;margin-top:15px;">

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

        document.getElementById('ful_img_modal1').onchange = function (e) {
            document.getElementById('img_upload_modal1').src = URL.createObjectURL(e.target.files[0]);
        };

        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

@endsection
