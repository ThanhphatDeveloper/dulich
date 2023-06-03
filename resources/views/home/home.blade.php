@extends('layouts.app')

@section('title', 'Home')

@section('header')
    @parent
@endsection

@section('content')
    <a href="{{route('users.index')}}">Danh sách user</a><br>
    <a href="{{route('tours.index')}}">Danh sách tour</a>
@endsection