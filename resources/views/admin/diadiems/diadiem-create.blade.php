@extends('layouts.app')

@section('title', 'Thêm địa điểm')

@section('header')
    @parent
    &gt; <a href="{{route('diadiems.index');}}">Địa điểm</a>
    &gt; Thêm địa điểm
@endsection

@section('content')
    <form method="post" action="{{route('diadiems.store')}}">
        @csrf
        <label>Địa điểm: </label><input name="diadiem" value="{{old('diadiem')}}"><br>
        @if($errors->has('diadiem')) {{$errors->first('diadiem')}} <br> @endif
        
        <input type="submit">
    </form>
@endsection