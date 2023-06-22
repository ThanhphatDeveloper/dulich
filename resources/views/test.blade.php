@extends('layouts.app')

@section('title', 'Thêm Tour')

@section('header')
    @parent
    &gt; <a href="{{route('tours.index');}}">Tours</a>
    &gt; Thêm tour
@endsection

@section('content')

        
        <input type="file" multiple/>

        <br><input type="submit">

    <style>

        .img {
                height: 100px;
                display: block;
            }
    </style>

    <script type="text/javascript">
        

        function imgToData(input) {
            $.each(input.files, function(i, v) {
                        var n = i + 1;
                        var File = new FileReader();
                        File.onload = function(event) {
                        $('<img/>').attr({
                            src: event.target.result,
                            class: 'img',
                            id: 'img-' + n + '-preview',
                        }).appendTo('body');
                        };

                        File.readAsDataURL(input.files[i]);
                    });
            }


            $('input[type="file"]').change(function(event) {
                imgToData(this);
            });

    </script>

@endsection
