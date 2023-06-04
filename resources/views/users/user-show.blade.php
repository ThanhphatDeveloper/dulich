@extends('layouts.app')

@section('title', 'User list')

@section('header')
    @parent
    &gt; <a href="{{route('users.index');}}">Users</a>
@endsection

@section('content')
    <h1>{{$u->ho}} {{$u->ten}}</h1>
    <a href="{{route('users.edit', ['user'=>$u])}}">Sửa</a><br>
    <form method="post" action="{{route('users.destroy', ['user'=>$u])}}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Xóa">
    </form>
    <img style="width:300px;max-height:300px;object-fit:contain;" src="{{$u->image}}">
    <p>Email: {{$u->email}}</p>
    <p>Số điện thoại: {{$u->sdt}}</p>
    <p>Ngày đăng ký: {{$u->email_verified_at}}</p>
    <p>
        Chức năng: 
        @if ($u->admin == 1) admin cấp 1 @endif
        @if ($u->admin == 0) admin cấp 2 @endif
    </p>
    <br>
@endsection
