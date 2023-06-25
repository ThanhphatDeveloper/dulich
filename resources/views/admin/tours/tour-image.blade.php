@extends('layouts.app')

@section('title', 'Danh sách ảnh tour')

@section('header')
    @parent
    <a href="{{route('tours.index');}}">Ảnh</a>
@endsection

@section('content')
    <h2>{{$tour->tentour}}</h2>
    <h4>Danh sách ảnh</h4>

    <form method="post" action="{{route('imagetours.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="custom-file">
        
            <input type="hidden" name="id" value="{{$tour->id}}">
            <label>Ảnh đại diện: </label><input class="custom-file-input" id="ful_img" type="file" accept="image/*" name="image">
            <label class="custom-file-label" for="customFile">Chọn ảnh</label><br>
        </div>
        @if($errors->has('image')) {{$errors->first('image')}} <br> @endif
        <img id="img_upload" style="width:100px;max-height:100px;object-fit:contain;"><br>

        <input type="submit">
    </form>

    <table>
        <thead>
            <tr>
                <th>ảnh</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($lst as $i)
                <tr>
                    
                    <td>
                        <img style="width:100px;max-height:100px;object-fit:contain;" src="/storage/{{$i->image}}">
                    </td>
                    <td>
                        <form method="post" action="{{route('imagetours.destroy', ['imagetour'=>$i])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <div class="">
        {{$lst->appends(request()->all())->links()}}
    </div>

    <script>
        document.getElementById('ful_img').onchange = function (e) {
            document.getElementById('img_upload').src = URL.createObjectURL(e.target.files[0]);
        };

        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
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
