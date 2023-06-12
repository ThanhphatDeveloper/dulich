@extends('layouts.app')

@section('title', 'Danh sách tour')

@section('header')
    @parent
    &gt; <a href="{{route('tours.index');}}">Tours</a>
@endsection

@section('content')
    <h1>Danh sách tour</h1>

    <form method="get" action="">
        @csrf
        <input name="key" value="{{old('key')}}" placeholder="Từ khóa">
        <button type="submit">
            Tìm kiếm
        </button>
    </form>

    <a href="{{route('tours.create')}}">Thêm</a><br>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>tên tour</th>
                <th>điểm khởi hành</th>
                <th>điểm kết thúc</th>
                <th>loại tour</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lst as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td><a href="{{route('tours.show',['tour'=>$t])}}">{{$t->tentour}}</a></td>
                    <td>{{$t->dia_diem_khoi_hanh_id}}</td>
                    <td>{{$t->dia_diem_ket_thuc_id}}</td>

                    <td>{{$t->loai_tour->loaitour}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <div class="">
        {{$lst->appends(request()->all())->links()}}
    </div>
    
    <hr>
    <div class="">
        {{$lst->appends(request()->all())->links()}}
    </div>
    
@endsection
