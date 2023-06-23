@extends('layouts.app')

@section('title', 'Danh sách tài khoản')

@section('header')
    @parent
    <a href="{{route('users.index');}}">Tài khoản</a>
@endsection

@section('content')
    <h1>Danh sách tài khoản</h1>

    <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="">
        <div class="input-group">
        <input class="form-control search-top" name="key" value="{{old('key')}}" placeholder="Từ khóa(họ tên, số điện thoại, email">
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">
            <i class="fa fa-search"></i>
            </button>
        </span>
        </div>
    </form>

    <a href="{{route('users.create')}}">Thêm</a><br>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>ảnh</th>
                <th>email</th>
                <th>tên</th>
                <th>số điện thoại</th>
                <th>trạng thái</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($lst_users as $u)
                <tr>
                    <td>{{$u->id}}</td>
                    <td><img style="width:100px;max-height:100px;object-fit:contain;" src="{{$u->image}}"></td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->ho}} {{$u->ten}}</td>
                    <td>{{$u->sdt}}</td>
                    <td>
                        @if($u->trangthai == 0)
                            <span class="badge badge-danger">Ngừng hoạt động</span>
                        @else
                            <span class="badge badge-success">Hoạt động</span>
                        @endif
                    </td>
                    <td>
                        <form method="post" action="{{route('users.destroy', ['user'=>$u])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="get" action="{{route('users.edit', ['user'=>$u])}}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-edit"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <div class="">
        {{$lst_users->appends(request()->all())->links()}}
    </div>
    
    
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