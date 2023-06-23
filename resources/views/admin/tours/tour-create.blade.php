@extends('layouts.app')

@section('title', 'Thêm Tour')

@section('header')
    @parent
    <a href="{{route('tours.index');}}">Tours</a>
    <li class="breadcrumb-item active">Thêm tour</li>
@endsection

@section('content')
    <form method="post" action="{{route('tours.store')}}" enctype="multipart/form-data">
        @csrf
        <label>Tên tour: </label><input name="tentour" value="{{old('tentour')}}"><br>
        @if($errors->has('tentour')) {{$errors->first('tentour')}} <br> @endif

        <label>Loại tour: </label>
        <select name="loaitour">
            @foreach($lst_loai_tour as $cat)
                <option value="{{$cat->id}}"> @if ($cat->id==old('loaitour'))
                @endif {{$cat->loaitour}}</option>
            @endforeach
        </select><br>

        <label>Điểm khởi hành: </label>
        <select name="dkh">
            @foreach($lst_dd as $d)
                <option value="{{$d->id}}"> @if ($d->id==old('diadiem'))
                    selected @endif {{$d->diadiem}}</option>
            @endforeach
        </select><br>

        <label>Điểm kết thúc: </label>
        <select name="dkt">
            @foreach($lst_dd as $d)
                <option value="{{$d->id}}"> @if ($d->id==old('diadiem'))
                @endif {{$d->diadiem}}</option>
            @endforeach
        </select><br>

        <label>Nhà cung cấp: </label>
        <select name="ncc">
            @foreach($lst_ncc as $n)
                <option value="{{$n->id}}"> @if ($n->id==old('ncc'))
                   @endif {{$n->nhacungcap}}</option>
            @endforeach
        </select><br>

        <label>Thời gian: </label>
        <input type="number" name="ngay" value="{{old('ngay')}}">N
        <input type="number" name="dem" value="{{old('dem')}}">D<br>
        @if($errors->has('ngay')) {{$errors->first('ngay')}} @endif
        @if($errors->has('dem')) {{$errors->first('dem')}} @endif <br>

        <label>Giá: </label><input type="number" name="gia" value="{{old('gia')}}"><br>
        @if($errors->has('gia')) {{$errors->first('gia')}} <br> @endif

        <label>Mô tả: </label><br><textarea rows="8" id="editor" class="form-control" name="mota" rows="4" cols="50" value="{{old('mota')}}">
            {{old('mota')}}
        </textarea><br>
        @if($errors->has('mota')) {{$errors->first('mota')}} <br> @endif

        <label>Ngày khởi hành: </label><input type="datetime-local" name="nkh" value="{{old('nkh')}}"><br>
        @if($errors->has('nkh')) {{$errors->first('nkh')}} <br> @endif

        <label>Phương tiện: </label>
        <select name="phuongtien">
            <option value='Xe khách'>Xe khách</option>
            <option value='Máy bay'>Máy bay</option>
        </select><br>

        <label>Khuyến mãi: </label>
        <select name="khuyenmai">
            @foreach($lst_km as $k)
                <option value="{{$k->id}}"> @if ($k->id==old('km'))
                    selected @endif {{$k->mucgiam}}</option>
            @endforeach
        </select><br>

        
        <!-- <label>Ảnh đại diện: </label><input id="ful_img" type="file" accept="image/*" name="image"><br>
        @if($errors->has('image')) {{$errors->first('image')}} <br> @endif
        <img id="img_upload" style="width:100px;max-height:100px;object-fit:contain;"><br> -->
        <label>Ảnh liên quan: </label>
        <input id="img_upload" name="image" type="file" accept="image/*" name="image[]" multiple/><br>
        @if($errors->has('image')) {{$errors->first('image')}} <br> @endif
        <div id="img_locate"></div>

        <br><input type="submit">
    </form>

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        .img {
                height: 100px;
                display: block;
            }
    </style>

    <script type="text/javascript">

        function imgToData(input) {
            $.each(input.files, function(i, v) {
                var n = i + 1;
                var File = new FileReader();
                File.onload = function(event) {
                    $("#img_locate").append(
                        $('<img/>').attr({
                            src: event.target.result,
                            class: 'img',
                            id: 'img-' + n + '-preview',
                            style: 'style="width:100px;max-height:100px;object-fit:contain;"'
                        }).appendTo('body')
                    );
                };

                File.readAsDataURL(input.files[i]);
            });
        }

        $('input[type="file"]').change(function(event) {
            imgToData(this);
        });

    </script>
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