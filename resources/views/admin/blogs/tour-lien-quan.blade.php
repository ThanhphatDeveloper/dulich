@extends('layouts.app')

@section('title', 'Danh sách tour liên quan')

@section('header')
    @parent
    <a href="{{route('tourlienquans.index');}}">Tour liên quan</a>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách tour liên quan</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
                    <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($lst as $d)
                <tr>
                    <td>
                        @foreach($lst_tour as $t)
                            @if($d->tour_id == $t->id)
                                {{$t->tentour}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <form method="post" action="{{route('tourlienquans.destroy', ['tourlienquan'=>$d])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return checkDelete()" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

            @endforeach
                
              </tbody>
            </table>
            <div class="form-group">
                        @foreach($lst_tour as $a)
                            @foreach($lst_tlq as $b)
                                @if($a->id != $b->tour_id)
                                    {{$a->id}}
                                    @break
                                @endif
                            @endforeach
                        @endforeach
                        <br>
                        {{count($lst_tour)}}
                        <br>
                        @foreach($lst_tlq as $b)
                            {{$b->tour_id}}
                        @endforeach
                </div>
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

    <!-- Modal store-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm tour liên quan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('tourlienquans.store')}}">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="blog_id" value="{{$blog_id}}">
                    <select class="custom-select custom-select-sm" name="tour_id">
                        @foreach($lst_tlq as $b)
                            @foreach($lst_tour as $cat)
                                @if($b->tour_id != $cat->id)
                                    <option value="{{$cat->id}}"> @if ($cat->id==old('tour_id'))
                                    @endif {{$cat->tentour}}</option>
                                @endif
                            @endforeach
                        @endforeach
                    </select>          
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <script src="{{asset('vendor/jquery/jquery.js')}}"></script>

    <script>
        
        

    </script>
@endsection
