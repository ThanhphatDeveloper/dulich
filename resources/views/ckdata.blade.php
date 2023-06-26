<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <title>ckeditor</title>
</head>
<body>
    <form method="post" action="{{route('ckdata.store')}}" enctype="multipart/form-data">
    @csrf
        <textarea rows="8" id="editor" name="data" rows="15" cols="100"></textarea>
        <center>
            <button id="btn-submit" type="submit" class="btn btn-danger">Convert</button>
        </center>
    </form>
    
    <script>
        CKEDITOR.replace('editor');
    </script>
</body>
</html>