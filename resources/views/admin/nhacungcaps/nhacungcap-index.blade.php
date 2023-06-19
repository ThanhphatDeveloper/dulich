@extends('layouts.app')

@section('title', 'Danh sách nhà cung cấp')

@section('header')
    @parent
    &gt; <a href="{{route('nhacungcaps.index');}}">Nhà cung cấp</a>
@endsection

@section('content')
    <h1>Danh sách nhà cung cấp</h1>

    <form method="get" action="">
        @csrf
        <input name="key" value="{{old('key')}}" placeholder="Từ khóa">
        <button type="submit">
            Tìm kiếm
        </button>
    </form>

    <a href="{{route('nhacungcaps.create')}}">Thêm</a><br>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nhà cung cấp</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($lst as $n)
                <tr>
                    <td>{{$n->id}}</td>
                    <td>{{$n->nhacungcap}}</td>
                    <td>
                        @if($n->trangthai == 0)
                            <span class="badge badge-danger">Ngừng hoạt động</span>
                        @else
                            <span class="badge badge-success">Hoạt động</span>
                        @endif
                    </td>
                    <td>
                        <form method="post" action="{{route('nhacungcaps.destroy', ['nhacungcap'=>$n])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                    <td>
                        <form method="get" action="{{route('nhacungcaps.edit', ['nhacungcap'=>$n])}}">
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
