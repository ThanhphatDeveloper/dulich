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
        @method('PUT')
        <label>Tên tour: </label><input name="tentour" value="{{old('tentour', $t->tentour)}}"><br>
        @if($errors->has('tentour')) {{$errors->first('tentour')}} <br> @endif

        <label>Loại tour: </label>
        <select name="loaitour">
            @foreach($lst_loai_tour as $cat)
                <option value="{{$cat->id}}" @if($t->loai_tour_id_id==old('loaitour',$cat->id))
                    selected @endif> {{$cat->loaitour}}</option>
            @endforeach
        </select><br>

        <label>Điểm khởi hành: </label>
        <select name="dkh">
            @foreach($lst_dd as $d)
                <option value="{{$d->id}}" @if($t->dia_diem_khoi_hanh_id==old('dkh',$d->id))
                    selected @endif> {{$d->diadiem}}</option>
            @endforeach
        </select><br>

        <label>Điểm kết thúc: </label>
        <select name="dkt">
            @foreach($lst_dd as $d)
                <option value="{{$d->id}}" @if($t->dia_diem_ket_thuc_id==old('dkh',$d->id))
                    selected @endif> {{$d->diadiem}}</option>
            @endforeach
        </select><br>

        <label>Nhà cung cấp: </label>
        <select name="ncc">
            @foreach($lst_ncc as $n)
                <option value="{{$n->id}}" @if($t->nha_cung_cap_id==old('ncc',$n->id))
                    selected @endif> {{$n->nhacungcap}}</option>
            @endforeach
        </select><br>

        <label>Thời gian: </label>
        <input type="number" name="ngay" value="{{old('ngay', $lst_tg->songay)}}">N
        <input type="number" name="dem" value="{{old('dem', $lst_tg->sodem)}}">D
        @if($errors->has('ngay')) {{$errors->first('ngay')}} @endif
        @if($errors->has('dem')) {{$errors->first('dem')}} @endif <br>

        <label>Giá: </label><input type="number" name="gia" value="{{old('gia', $t->gia)}}"><br>
        @if($errors->has('gia')) {{$errors->first('gia')}} <br> @endif

        <label>Mô tả: </label><br><textarea id="edittour" class="form-control" name="mota" rows="4" cols="50">
            {!!old('mota', $t->mota)!!}
        </textarea><br>
        @if($errors->has('mota')) {{$errors->first('mota')}} <br> @endif

        <label>Ngày khởi hành: </label><input type="datetime-local" name="nkh" 
        value="{{old('nkh', $t->ngaykhoihanh)}}"><br>
        @if($errors->has('nkh')) {{$errors->first('nkh')}} <br> @endif

        <label>Phương tiện: </label>
        <select name="phuongtien">
            <option value='Xe khách' @if ($t->phuongtien=='Xe khách') selected @endif>Xe khách</option>
            <option value='Máy bay' @if ($t->phuongtien=='Máy bay') selected @endif>Máy bay</option>
        </select><br>

        <label>Khuyến mãi: </label>
        <select name="khuyenmai">
            @foreach($lst_km as $k)
                <option value="{{$k->id}}" @if($t->khuyen_mai_id==old('khuyenmai',$k->id))
                    selected @endif> {{$k->mucgiam}}</option>
            @endforeach
        </select><br>

        <label>Ảnh đại diện: </label><input id="ful_img" type="file" accept="image/*" name="image"><br>
        @if($errors->has('image')) {{$errors->first('image')}} <br> @endif
        @foreach($lst_img as $i)
            <img id="img_upload" src="{{$i->image}}" style="width:100px;max-height:100px;object-fit:contain;"><br>
        @endforeach

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
        document.getElementById('ful_img').onchange = function (e) {
            document.getElementById('img_upload').src = URL.createObjectURL(e.target.files[0]);
        }

        ClassicEditor
        .create( document.querySelector( '#edittour' ) )
        .catch( error => {
            console.error( error );
        });
    </script>
@endsection