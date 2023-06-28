@extends('layouts.app')

@section('title', 'Danh sách tour')

@section('header')
    @parent
    <a href="{{route('tours.index');}}">Tours</a>
@endsection

@section('content')

    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách tour </div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="{{route('tours.create')}}">
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    Thêm tour
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
                    <th>Tên tour</th>
                    <th>Điểm khởi hành</th>
                    <th>Điểm kết thúc</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Hình ảnh</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($lst as $t)
                    <tr>
                        <td>{{$t->tentour}}</td>
                        <td>
                            @foreach($lst_diadiem as $d)
                                @if($t->dia_diem_khoi_hanh_id == $d->id)
                                    {{$d->diadiem}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($lst_diadiem as $d)
                                @if($t->dia_diem_ket_thuc_id == $d->id)
                                    {{$d->diadiem}}
                                @endif
                            @endforeach
                        </td>

                        <td>{{number_format($t->gia, 0, '', ',')}}</td>
                        <td>
                            @if($t->trangthai == 0)
                                <span class="badge badge-danger">Ngừng hoạt động</span>
                            @else
                                <span class="badge badge-success">Hoạt động</span>
                            @endif
                        </td>
                        <td>
                            <form method="get" action="{{route('imagetours.index')}}">
                                <input type="hidden" name="id" value="{{$t->id}}">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fas fa-image"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{route('tours.destroy', ['tour'=>$t])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form method="get" action="{{route('tours.edit', ['tour'=>$t])}}">
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
