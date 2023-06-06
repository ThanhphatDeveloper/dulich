@extends('layouts.app')

@section('title', 'Danh sách loại tour')

@section('header')
    @parent
    &gt; <a href="{{route('loaitours.index');}}">Users</a>
@endsection

@section('content')
    <h1>Danh sách loại tour</h1>
    <a href="{{route('loaitours.create')}}">Thêm</a><br>
    @foreach($lst as $l)
        <div class="loaitour">
            <p>
                {{$l->loaitour}}
                <form method="post" action="{{route('loaitours.destroy', ['loaitour'=>$l])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Xóa</button>
                </form>
            </p>
        </div>
    @endforeach
@endsection
