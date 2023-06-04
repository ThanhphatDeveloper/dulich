@extends('layouts.app')

@section('title', 'User list')

@section('header')
    @parent
    &gt; <a href="{{route('users.index');}}">Users</a>
@endsection

@section('content')
    <h1>Danh sách user</h1>
    <a href="{{route('users.create')}}">Thêm</a><br>
    @foreach($lst as $u)
        <div class="tour">
            <img style="width:100px;max-height:100px;object-fit:contain;" src="{{$u->image}}">
            <a href="{{route('users.show',['user'=>$u])}}">{{$u->email}}</a>
            {{$u->ho}}
            {{$u->ten}}
            {{$u->sdt}}
        </div>
    @endforeach
@endsection
