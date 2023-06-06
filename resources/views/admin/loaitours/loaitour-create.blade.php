@extends('layouts.app')

@section('title', 'Thêm loại tour')

@section('header')
    @parent
    &gt; <a href="{{route('loaitours.index');}}">Loại tour</a>
    &gt; Thêm loại tour
@endsection

@section('content')
    <form method="post" action="{{route('loaitours.store')}}">
        @csrf
        <label>Loại tour: </label><input name="loaitour" value="{{old('loaitour')}}"><br>
        @if($errors->has('loaitour')) {{$errors->first('loaitour')}} <br> @endif
        
        <input type="submit">
    </form>
@endsection