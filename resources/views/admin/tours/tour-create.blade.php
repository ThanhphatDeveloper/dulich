@extends('layouts.app')

@section('title', 'Thêm Tour')

@section('header')
    @parent
    &gt; <a href="{{route('tours.index');}}">Tours</a>
    &gt; Thêm tour
@endsection

@section('content')
    <form method="post" action="{{route('tours.store')}}" enctype="multipart/form-data">
        @csrf
        <label>Tên tour: </label><input name="tentour" value="{{old('tentour')}}"><br>
        @if($errors->has('tentour')) {{$errors->first('tentour')}} <br> @endif

        <label>Loại tour: </label>
        <select name="loaitour">
            @foreach($lst_loai_tour as $cat)
                <option value="{{$cat->id}}"> @if ($cat->id==old('loaitour'))
                    selected @endif {{$cat->loaitour}}</option>
            @endforeach
        </select><br>

        <label>Điểm khởi hành: </label>
        <select name="dkh">
            @foreach($lst_dd as $d)
                <option value="{{$d->id}}"> @if ($d->id==old('diadiem'))
                    selected @endif {{$d->diadiem}}</option>
            @endforeach
        </select><br>

        <label>Điểm kết thúc: </label>
        <select name="dkt">
            @foreach($lst_dd as $d)
                <option value="{{$d->id}}"> @if ($d->id==old('diadiem'))
                    selected @endif {{$d->diadiem}}</option>
            @endforeach
        </select><br>

        <label>Nhà cung cấp: </label>
        <select name="ncc">
            @foreach($lst_ncc as $n)
                <option value="{{$n->id}}"> @if ($n->id==old('ncc'))
                    selected @endif {{$n->nhacungcap}}</option>
            @endforeach
        </select><br>

        <label>Thời gian: </label>
        <input name="ngay" value="{{old('ngay')}}">N
        @if($errors->has('ngay')) {{$errors->first('ngay')}} @endif
        <input name="dem" value="{{old('dem')}}">D
        @if($errors->has('dem')) {{$errors->first('dem')}} @endif <br>

        <label>Giá: </label><input name="gia" value="{{old('gia')}}"><br>
        @if($errors->has('gia')) {{$errors->first('gia')}} <br> @endif

        <label>Mô tả: </label><br><textarea id="editor" class="form-control" name="mota" rows="4" cols="50" value="{{old('mota')}}"></textarea><br>
        @if($errors->has('mota')) {{$errors->first('mota')}} <br> @endif

        <label>Ngày khởi hành: </label><input name="nkh" value="{{old('nkh')}}"><br>
        @if($errors->has('nkh')) {{$errors->first('nkh')}} <br> @endif

        <label>Phương tiện: </label>
        <select name="phuongtien">
            <option value='Xe khách'>Xe khách</option>
            <option value='Máy bay'>Máy bay</option>
        </select><br>

        <label>Khuyến mãi: </label>
        <select name="khuyenmai">
            @foreach($lst_km as $k)
                <option value="{{$k->id}}"> @if ($k->id==old('km'))
                    selected @endif {{$k->mucgiam}}</option>
            @endforeach
        </select><br>

        
        <label>Ảnh đại diện: </label><input id="ful_img" type="file" accept="image/*" name="image"><br>
        @if($errors->has('image')) {{$errors->first('image')}} <br> @endif
        <img id="img_upload" style="width:100px;max-height:100px;object-fit:contain;"><br>

        <input type="submit">
    </form>

    <script>
        document.getElementById('ful_img').onchange = function (e) {
            document.getElementById('img_upload').src = URL.createObjectURL(e.target.files[0]);
        }

        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        });
    </script>
@endsection