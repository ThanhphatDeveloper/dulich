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
        <input name="key" value="{{old('key')}}" placeholder="Từ khóa(họ tên, số điện thoại, email">
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
                <th>nhà cung cấp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lst as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td>{{$t->tentour}}</td>
                    <td>{{$t->diemkhoihanh}}</td>
                    <td>{{$t->diemketthuc}}</td>

                    <td>{{$t->loai_tour->loaitour}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <div class="">
        {{$lst->appends(request()->all())->links()}}
    </div>
    
    
@endsection
