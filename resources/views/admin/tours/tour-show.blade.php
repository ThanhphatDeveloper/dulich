@extends('layouts.app')

@section('title', 'Thông tin tour')

@section('header')
    @parent
    &gt; <a href="{{route('tours.index');}}">Tour</a>
@endsection

@section('content')
    <h1>{{$t->tentour}}</h1>
    <a href="{{route('tours.edit', ['tour'=>$t])}}">Sửa</a><br>
    <form method="post" action="{{route('tours.destroy', ['tour'=>$t])}}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Xóa">
    </form>
    <p>{{$t->id}}</p>
    <p>Giá: {{$t->gia}}</p>
    <p>Mô tả: {{$t->mota}}</p>
    <p>Ngày khởi hành: {{$t->ngaykhoihanh}}</p>
    <p>Phương tiện: {{$t->phuongtien}}</p>
    <p>Loại tour: {{$t->loai_tour_id}}</p>
    <p>Địa điểm khởi hành: {{$t->dia_diem_khoi_hanh_id}}</p>
    <p>Địa điểm kết thúc: {{$t->dia_diem_ket_thuc_id}}</p>
    <p>Nhà cung cấp: {{$t->nha_cung_cap_id}}</p>
    <p>Thời gian: {{$t->thoi_gian_id}}</p>
    <p>Khuyến mãi: {{$t->khuyen_mai_id}}</p>
    <p>
        Trạng thái:
        @if ($t->trangthai == 1) Hoạt động @endif
        @if ($t->trangthai == 0) Không hoạt động @endif
    </p>
    @foreach($lst_img as $i)
        @if($i->tour_id == $t->id)
            {{$i->image}}
        @endif
    @endforeach
    <br>
@endsection
