@extends('layouts.app')

@section('title', 'Danh sách địa điểm')

@section('header')
    @parent
    &gt; <a href="{{route('diadiems.index');}}">Địa điểm</a>
@endsection

@section('content')
    <h1>Danh sách địa điểm</h1>

    <form method="get" action="">
        @csrf
        <input name="key" value="{{old('key')}}" placeholder="Từ khóa">
        <button type="submit">
            Tìm kiếm
        </button>
    </form>

    <a href="{{route('diadiems.create')}}">Thêm</a><br>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Địa điểm</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($lst as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    <td>{{$d->diadiem}}</td>
                    <td>
                        @if($d->trangthai == 0)
                            <span class="badge badge-danger">Ngừng hoạt động</span>
                        @else
                            <span class="badge badge-success">Hoạt động</span>
                        @endif
                    </td>
                    <td>
                        <form method="post" action="{{route('diadiems.destroy', ['diadiem'=>$d])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                    <td>
                        <form method="get" action="{{route('diadiems.edit', ['diadiem'=>$d])}}">
                            @csrf
                            <button type="submit" class="btn btn-outline-info m-2">Sửa</button>
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
@endsection
