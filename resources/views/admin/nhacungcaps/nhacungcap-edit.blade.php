@extends('layouts.app')

@section('title', 'Sửa nhà cung cấp')

@section('header')
    @parent
    &gt; <a href="{{route('diadiems.index');}}">Nhà cung cấp</a>
    &gt; Sửa nhà cung cấp
@endsection

@section('content')
    <form method="post" action="{{route('nhacungcaps.update',['nhacungcap'=>$n])}}">
        @csrf
        @method('PUT')
        <label>Nhà cung cấp: </label><input name="nhacungcap" value="{{old('nhacungcap', $n->nhacungcap)}}"><br>
        @if($errors->has('nhacungcap')) {{$errors->first('nhacungcap')}} <br> @endif

        <label>Trạng thái: </label>
        <select name="trangthai">
            <option value='1' @if ($n->trangthai==1) selected @endif>Hoạt động</option>
            <option value='0' @if ($n->trangthai==0) selected @endif>Ngừng hoạt động</option>
        </select><br>
        
        <input type="submit">
    </form>
@endsection
