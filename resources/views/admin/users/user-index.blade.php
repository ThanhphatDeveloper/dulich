@extends('layouts.app')

@section('title', 'User list')

@section('header')
    @parent
    &gt; <a href="{{route('users.index');}}">Users</a>
@endsection

@section('content')
    <h1>Danh sách user</h1>

    <form method="get" action="">
        @csrf
        <input name="key" value="{{old('key')}}" placeholder="Từ khóa(họ tên, số điện thoại, email">
        <button type="submit">
            Tìm kiếm
        </button>
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
            </tr>
        </thead>
        <tbody>
            @foreach($lst_users as $u)
                <tr>
                    <td>{{$u->id}}</td>
                    <td><img style="width:100px;max-height:100px;object-fit:contain;" src="{{$u->image}}"></td>
                    <td><a href="{{route('users.show',['user'=>$u])}}">{{$u->email}}</a></td>
                    <td>{{$u->ho}} {{$u->ten}}</td>
                    <td>{{$u->sdt}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <div class="">
        {{$lst_users->appends(request()->all())->links()}}
    </div>
    
    
@endsection
