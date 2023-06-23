<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <a style="cursor: pointer" class="dropdown-item" data-toggle="modal" data-target="#editmodal">
        <i class="fa fa-fw fa-sign-out"></i>Đăng xuất
    </a>
    <a style="cursor: pointer" class="dropdown-item" data-toggle="modal" data-target="#logoutmodal">
        <i class="fa fa-fw fa-sign-out"></i>Đăng xuất
    </a>

    <!-- Logout modal-->
    <div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="examplemodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="examplemodalLabel">Thông báo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Bạn chắc chắn muốn đăng xuất</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                    @auth
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            <button class="btn btn-primary" type="submit">Đăng xuất</button>
                        </form>
                    @endauth
            </div>
        </div>
        </div>
    </div>

    <!-- Edit profile model -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="examplemodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="examplemodalLabel">Thông báo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Bạn chắc chắn muốn đăng xuất</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                    @auth
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            <button class="btn btn-primary" type="submit">Đăng xuất</button>
                        </form>
                    @endauth
            </div>
        </div>
    </div>

</body>
</html>