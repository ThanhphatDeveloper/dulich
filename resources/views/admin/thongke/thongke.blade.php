@extends('layouts.app')

@section('title', 'Danh sách địa điểm')

@section('header')
    @parent
    <a href="{{route('statistic.index');}}">Thống kê</a>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Thống kê</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form class="" method="post" action="{{route('index_date')}}">
                          @csrf
                            <div class="input-group float-right">
                                <div class="input-group mb-3">
                                      <input value="{{old('start')}}" type="date" name="start">
                                      <input value="{{old('end')}}" style="margin-left: 15px" type="date" name="end">
                                      <button style="margin-left: 15px" class="btn btn-primary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                              <span class="input-group-btn">
                              </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-area-chart"></i> Biểu đồ thu nhập</div>
          <div class="card-body">
            <div id="myfirstchart" style="height: 250px;"></div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Biểu đồ số đơn đã đặt</div>
            <div class="card-body">
              <div id="bar" style="height: 250px"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Biểu đồ số khách của tour trong ngày</div>
            <div class="card-body">
              <div id="donut" style="height: 250px"></div>
            </div>
          </div>
        </div>
		  </div>
        
		  </div>
      </div>
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script>
      new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
                  hideHover: 'auto',
                  fillOpacity: 0.3,
                  parseTime: false,
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [
          @foreach ($lst as $sale)
            {

                'date': '{{ \Carbon\Carbon::parse($sale->thoigiankhoihanh)->format('d/m/Y') }} ',
                'amount': '{{ $sale->thanhtien }}'
            },
          @endforeach
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'date',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['amount'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        behaveLikeLine: true,
        labels: ['Số tiền']
      });

      new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'bar',
                  hideHover: 'auto',
                  fillOpacity: 0.3,
                  parseTime: false,
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [
          @foreach ($lst_don as $sale)
            {

                'date': '{{ \Carbon\Carbon::parse($sale->ngaydat)->format('d/m/Y') }} ',
                'amount': '{{ $sale->tongdon }}'
            },
          @endforeach
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'date',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['amount'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        behaveLikeLine: true,
        labels: ['Số đơn']
      });

      new Morris.Donut({
        // ID of the element in which to draw the chart.
        element: 'donut',
        resize: true,
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        colors: [
            '#f05d7a',
            '#ffae9b',
            '#ffeaef',
            '#f78701',
            '#08c6ac',
            '#fecc3b',
            '#1889fc',
            '#fcb731',
            '#2693d9',
            '#006064'
        ],
        labelColor:"#08af3f", // text color
        backgroundColor: '#333333', // border col

        data: [
          @foreach ($lst_customer as $sale)
            {
                'label': '{{ \Carbon\Carbon::parse($sale->thoigiankhoihanh)->format('d/m/Y') }} ',
                'value': '{{ $sale->sokhach }}'
            },
          @endforeach
        ],
      });
    </script>
@endsection
