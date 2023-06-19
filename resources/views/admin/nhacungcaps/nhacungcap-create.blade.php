@extends('layouts.app')

@section('title', 'Thêm nhà cung cấp')

@section('header')
    @parent
    &gt; <a href="{{route('diadiems.index');}}">Nhà cung cấp</a>
    &gt; Thêm nhà cung cấp
@endsection

@section('content')
    <form method="post" action="{{route('nhacungcaps.store')}}">
        @csrf
        <label>Nhà cung cấp: </label><input name="nhacungcap" value="{{old('nhacungcap')}}"><br>
        @if($errors->has('nhacungcap')) {{$errors->first('nhacungcap')}} <br> @endif
        
        <input type="submit">
    </form>
@endsection