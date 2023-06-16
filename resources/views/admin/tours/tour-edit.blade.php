@extends('layouts.app')

@section('title', 'Edit Tour')

@section('header')
    @parent
    &gt; <a href="{{route('tours.index');}}">Tours</a>
    &gt; Edit tour
@endsection

@section('content')
    <form method="post" action="{{route('tours.update', ['tour'=>$t])}}" enctype="multipart/form-data">
        @csrf
        <label>Tên tour: </label><input name="tentour" value="{{old('tentour', $t->tentour)}}"><br>
        @if($errors->has('tentour')) {{$errors->first('tentour')}} <br> @endif

        <label>Giá: </label><input type="number" name="gia" value="{{old('gia', $t->gia)}}"><br>
        @if($errors->has('gia')) {{$errors->first('gia')}} <br> @endif

        <label>Mô tả: </label><br><textarea id="edittour" class="form-control" name="mota" rows="4" cols="50" value="{{old('mota')}}"></textarea><br>
        @if($errors->has('mota')) {{$errors->first('mota')}} <br> @endif

        <label>Ngày khởi hành: </label><input type="datetime-local" name="nkh" value="{{old('nkh', $t->nkh)}}"><br>
        @if($errors->has('nkh')) {{$errors->first('nkh')}} <br> @endif

        <input type="submit">
    </form>

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
    </style>

    <script>

        ClassicEditor
        .create( document.querySelector( '#edittour' ) )
        .catch( error => {
            console.error( error );
        });
    </script>
@endsection