@extends('layouts.app')

@section('title', 'Danh sách thanh toán')

@section('header')
    @parent
    <a href="{{route('thanhtoans.index');}}">Thanh toán</a>
@endsection

@section('content')
    <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-table"></i> Danh sách thanh toán</div>
            <div class="card-body">
            <div class="table-responsive">
                <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="{{route('diadiems.create')}}">
                                <div class="input-group">
                                <span class="input-group-btn">
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
                        <th>Tên phương thức</th>
                        <th>Số tiền</th>
                        <th>Mã thanh toán</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lst as $t)
                    <tr>
                        <td>{{$t->tenphuongthuc}}</td>
                        <td>{{number_format($t->sotien, 0, '', ',')}} VNĐ</td>
                        <td>{{$t->mathanhtoan}}</td>
                        <td>{{$t->tenkhachhang}}</td>
                        <td>{{$t->ngaythanhtoan}}</td>
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
