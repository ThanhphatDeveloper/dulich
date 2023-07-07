@extends('layouts.app')

@section('title', 'Đơn đã duyệt')

@section('header')
    @parent
    <a href="{{route('da_duyet')}}">Đơn hàng đã duyệt</a>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Đơn hàng đã duyệt</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <form class="" method="get" action="">
                            <div class="input-group float-right">
                                <div class="input-group mb-3">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tbody>
                <tr>
                    <td>Họ tên</td>
                    <td>{{$donhang->ten}}</td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>{{$donhang->sdt}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$donhang->email}}</td>
                </tr>
                <tr>
                    <td>Tên tour</td>
                    <td>
                        @foreach($lst_tour as $t)
                            @if($donhang->tour_id == $t->id)
                                {{$t->tentour}}
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Địa điểm khởi hành</td>
                    <td>
                        @foreach($lst_tour as $t)
                            @if($donhang->tour_id == $t->id)
                                @foreach($lst_dd as $d)
                                    @if($t->dia_diem_khoi_hanh_id == $d->id)
                                        {{$d->diadiem}}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Địa điểm kết thúc</td>
                    <td>
                        @foreach($lst_tour as $t)
                            @if($donhang->tour_id == $t->id)
                                @foreach($lst_dd as $d)
                                    @if($t->dia_diem_ket_thuc_id == $d->id)
                                        {{$d->diadiem}}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Thời gian</td>
                    <td>
                        @foreach($lst_tour as $t)
                            @if($donhang->tour_id == $t->id)
                                @foreach($lst_tg as $d)
                                    @if($t->thoi_gian_id == $d->id)
                                        {{$d->songay}}N {{$d->sodem}}D
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Thời gian khởi hành</td>
                    <td>{{\Carbon\Carbon::parse($donhang->thoigiankhoihanh)->format('d/m/Y H:m')}}</td>
                </tr>
                <tr>
                    <td>Số khách</td>
                    <td>{{$donhang->sokhach}}</td>
                </tr>
                <tr>
                    <td>Thời gian đặt</td>
                    <td>{{\Carbon\Carbon::parse($donhang->ngaydat)->format('d/m/Y H:m:s')}}</td>
                </tr>
                <tr>
                    <td>Giá tour</td>
                    <td>
                        @foreach($lst_tour as $t)
                            @if($donhang->tour_id == $t->id)
                                {{number_format($t->gia, 0, '', ',')}} VNĐ
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Giá khuyến mãi</td>
                    <td>
                        @foreach($lst_km as $t)
                            @if($donhang->khuyen_mai_id == $t->id)
                                {{number_format($t->mucgiam, 0, '', ',')}} VNĐ
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Tổng tiền</td>
                    <td>{{number_format($donhang->tongtien, 0, '', ',')}} VNĐ</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                    <td colspan="2"><b>Thông tin thanh toán</b></td>
                </tr>
                <tr>
                    <td>Mã thanh toán</td>
                    <td>{{$donhang->mathanhtoan}}</td>
                </tr>
                <tr>
                    <td>Phương thức thanh toán</td>
                    <td>{{$donhang->tenphuongthuctt}}</td>
                </tr>
                <tr>
                    <td>Tiền thanh toán</td>
                    <td>{{number_format($donhang->tienthanhtoan, 0, '', ',')}} VNĐ</td>
                </tr>
                <tr>
                    <td>Thời gian thanh toán</td>
                    <td>{{\Carbon\Carbon::parse($donhang->thoigianthanhtoan)->format('d/m/Y H:m:s')}}</td>
                </tr>
            </tfoot>
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
@endsection
