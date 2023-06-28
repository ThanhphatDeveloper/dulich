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
    
    <p>Giá: {{$t->gia}}</p>
    <p>Mô tả: {!!$t->mota!!}</p>
    <p>Ngày khởi hành: {{$t->ngaykhoihanh}}</p>
    <p>Phương tiện: {{$t->phuongtien}}</p>
    <p>
        Loại tour: 
        @foreach($lst_loai_tour as $l)
            @if($t->loai_tour_id == $l->id)
                {{$l->loaitour}}
            @endif
        @endforeach
    </p>
    <p>
        Địa điểm khởi hành: 
        @foreach($lst_dd as $d)
            @if($t->dia_diem_khoi_hanh_id == $d->id)
                {{$d->diadiem}}
            @endif
        @endforeach
    </p>
    <p>
        Địa điểm kết thúc: 
        @foreach($lst_dd as $d)
            @if($t->dia_diem_ket_thuc_id == $d->id)
                {{$d->diadiem}}
            @endif
        @endforeach
    </p>
    <p>
        Nhà cung cấp: 
        @foreach($lst_ncc as $n)
            @if($t->nha_cung_cap_id == $n->id)
                {{$n->nhacungcap}}
            @endif
        @endforeach
    </p>
    <p>
        Thời gian:
        @foreach($lst_tg as $tg)
            @if($t->thoi_gian_id == $tg->id)
                {{$tg->songay}}N{{$tg->sodem}}D
            @endif
        @endforeach
    </p>
    <p>
        Khuyến mãi: 
        @foreach($lst_km as $k)
            @if($t->khuyen_mai_id == $k->id)
                {{$k->mucgiam}}
            @endif
        @endforeach
    </p>
    <p>
        Trạng thái:
        @if ($t->trangthai == 1) Hoạt động @endif
        @if ($t->trangthai == 0) Không hoạt động @endif
    </p>

    <p>
        Ảnh tour:
    </p>
    <p>
        @foreach($lst_img as $i)
            @if($i->tour_id == $t->id)
                <img style="width:100px;max-height:100px;object-fit:contain;" src="{{$i->image}}">
            @endif
        @endforeach
    </p>
    <br>
@endsection
