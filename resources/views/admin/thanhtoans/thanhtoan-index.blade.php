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
                        <td>{{$t->sotien}}</td>
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