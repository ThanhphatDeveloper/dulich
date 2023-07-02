@extends('layouts.app')

@section('title', 'Đơn không được duyệt')

@section('header')
    @parent
    <a href="{{route('khong_duyet');}}">Đơn hàng không được duyệt</a>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách đơn hàng không được duyệt</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
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
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Tổng tiền</th>
                    <th>Tên tour</th>
                    <th>Thông tin chi tiết</th>
                </tr>
              </thead>
              <tbody>
              @foreach($lst as $d)
                <tr>
                    <td>{{$d->ten}}</td>
                    <td>{{$d->sdt}}</td>
                    <td>{{number_format($d->tongtien, 0, '', ',')}}</td>
                    <td>
                        @foreach($lst_tour as $t)
                            @if($d->tour_id == $t->id)
                                {{$t->tentour}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <form method="get" action="{{route('show_khong_duyet')}}">
                            <input type="hidden" name="id" value="{{$d->id}}">
                            <button type="submit" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
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
