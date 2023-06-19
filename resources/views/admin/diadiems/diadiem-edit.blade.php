@extends('layouts.app')

@section('title', 'Sửa địa điểm')

@section('header')
    @parent
    &gt; <a href="{{route('diadiems.index');}}">Địa điểm</a>
    &gt; Sửa địa điểm
@endsection

@section('content')
    <form method="post" action="{{route('diadiems.update',['diadiem'=>$d])}}">
        @csrf
        @method('PUT')
        <label>Địa điểm: </label><input name="diadiem" value="{{old('diadiem', $d->diadiem)}}"><br>
        @if($errors->has('diadiem')) {{$errors->first('diadiem')}} <br> @endif
        
        <label>Trạng thái: </label>
        <select name="trangthai">
            <option value='1' @if ($d->trangthai==1) selected @endif>Hoạt động</option>
            <option value='0' @if ($d->trangthai==0) selected @endif>Ngừng hoạt động</option>
        </select><br>
        <input type="submit">
    </form>
@endsection