@extends('layouts.app')

@section('title', 'Danh sách loại tour')

@section('header')
    @parent
    &gt; <a href="{{route('loaitours.index');}}">Users</a>
@endsection

@section('content')
    <h1>Danh sách loại tour</h1>

    <form method="get" action="">
        @csrf
        <input name="key" value="{{old('key')}}" placeholder="Từ khóa">
        <button type="submit">
            Tìm kiếm
        </button>
    </form>

    <a href="{{route('loaitours.create')}}">Thêm</a><br>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>loại tour</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($lst as $l)
                <tr>
                    <td>{{$l->id}}</td>
                    <td>{{$l->loaitour}}</td>
                    <td>
                        <form method="post" action="{{route('loaitours.destroy', ['loaitour'=>$l])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                    <td>
                        <form method="get" action="{{route('loaitours.edit', ['loaitour'=>$l])}}">
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
