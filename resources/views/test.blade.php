<!DOCTYPE html>
<html lang="en">
  
<head>
    
</head>
  
<body>
    <label>Thời gian: </label>
        <input id="ngay" type="number" name="ngay" >N
        <input id="dem" type="number" name="dem">D<br>
        <div id="noti_locate"></div><br>
        <button id="btn-submit" type="button" class="btn btn-primary">Thêm</button><br>

    <script src=
"https://code.jquery.com/jquery-3.4.1.min.js">
    </script>
  
    <script>
      $(document).ready(function () {
  
        $("#btn-submit").click(function () {
            var ngay = $("#ngay").val();
            var dem = $("#dem").val();
            if(ngay-dem==1 || ngay-dem==-1){
                $("#btn-submit").attr("type", "submit");
            }
            if(ngay-dem!=1 || ngay-dem!=-1){
                $("#noti_locate").text("Ngày đêm không hợp lệ");
            }
        });
      });
    </script>
</body>
  
</html>