@extends('layouts.app')

@section('title', 'Sửa loại tour')

@section('header')
    @parent
    &gt; <a href="{{route('loaitours.index');}}">Loại tour</a>
    &gt; Sửa loại tour
@endsection

@section('content')
    <form method="post" action="{{route('loaitours.update',['loaitour'=>$l])}}">
        @csrf
        @method('PUT')
        <label>Loại tour: </label><input name="loaitour" value="{{old('loaitour', $l->loaitour)}}"><br>
        @if($errors->has('loaitour')) {{$errors->first('loaitour')}} <br> @endif
        
        <input type="submit">
    </form>
@endsection