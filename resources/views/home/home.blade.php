@extends('layouts.app')

@section('title', 'Home')

@section('header')
    @parent
@endsection

@section('content')
    @can('admin')
        <a href="{{route('users.index')}}">Danh sách user</a><br>
        <a href="{{route('loaitours.index')}}">Danh sách loại tour</a><br>
    @endcan
    <a href="{{route('tours.index')}}">Danh sách tour</a><br>
    <a href="{{route('loaitours.index')}}">Danh sách  loại tour</a><br>
@endsection