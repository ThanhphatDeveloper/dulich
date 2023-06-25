<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ckeditor</title>
    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
</head>
<body>
    <textarea rows="8" id="editor" class="edit" name="mota" rows="4" cols="50"></textarea>

    <button id="get" type="button">Convert</button>

    <p id="noti_locate"></p>

    <script src="{{asset('vendor/jquery/jquery.js')}}"></script>
    <script>
        $(document).ready(function () {
        
            $("#get").click(function () {
                var editor = $(".edit").val();
                alert(editor);

                $("#noti_locate").text(editor);
            });
        });
        CKEDITOR.replace('editor');
    </script>
</body>
</html>