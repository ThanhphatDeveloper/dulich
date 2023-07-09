@extends('layouts.app')

@section('title', 'Đơn đã duyệt')

@section('header')
    @parent
    <a href="{{route('khachhangs.index');}}">Khách hàng</a>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách đơn hàng đã đặt của: <h4>{{$khachhang->hoten}}</h4></div>
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
                    <th>Số điện thoại</th>
                    <th>Tổng tiền</th>
                    <th>Tên tour</th>
                    <th>Trạng thái</th>
                    <th>Thông tin chi tiết</th>
                </tr>
              </thead>
              <tbody>
              @foreach($lst as $d)
                <tr>
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
                        @if($d->trangthai == 0 && $d->thoigianxoa == null)
                            <span class="badge badge-info">Chưa duyệt</span>
                        @endif

                        @if($d->trangthai == 1)
                            <span class="badge badge-success">Đã duyệt</span>
                        @endif

                        @if($d->trangthai == 0 && $d->thoigianxoa != null)
                            <span class="badge badge-danger">Không được duyệt</span>
                        @endif
                        
                    </td>
                    <td>
                        @if($d->trangthai == 0 && $d->thoigianxoa == null)
                            <form method="get" action="{{route('donhangs.show', ['donhang'=>$d])}}">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </form>
                        @endif

                        @if($d->trangthai == 1)
                            <form method="get" action="{{route('show_da_duyet')}}">
                                <input type="hidden" name="id" value="{{$d->id}}">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </form>
                        @endif

                        @if($d->trangthai == 0 && $d->thoigianxoa != null)
                            <form method="get" action="{{route('show_khong_duyet')}}">
                                <input type="hidden" name="id" value="{{$d->id}}">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </form>
                        @endif
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
