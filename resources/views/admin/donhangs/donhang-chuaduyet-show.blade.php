@extends('layouts.app')

@section('title', 'Đơn chưa duyệt')

@section('header')
    @parent
    <a href="{{route('donhangs.index');}}">Đơn hàng chưa duyệt</a>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Đơn hàng chưa duyệt</div>
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
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>{{$donhang->ten}}</td>
                    <td>{{$donhang->sdt}}</td>
                    <td>{{number_format($donhang->tongtien, 0, '', ',')}}</td>
                    <td>
                        @foreach($lst_tour as $t)
                            @if($donhang->tour_id == $t->id)
                                {{$t->tentour}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <form method="get" action="{{route('donhangs.show', ['donhang'=>$donhang])}}">
                            <button type="submit" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="{{route('donhangs.update', ['donhang'=>$donhang])}}">
                            @csrf
                            @method('PUT')
                            <button type="submit" onclick="return checkOrder()" class="btn btn-sm btn-success">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="{{route('donhangs.destroy', ['donhang'=>$donhang])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return checkDelete()" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
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

    <header>
        <script type="text/javascript">
            function checkOrder() {
                return confirm('Bạn có chắc chắn muốn duyệt đơn');
            }
        </script>
    </header>
@endsection
