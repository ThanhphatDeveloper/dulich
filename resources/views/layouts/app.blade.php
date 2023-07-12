<!DOCTYPE html>
<html>
<head>
    <title>Trung Phát Travel - @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">

    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">

    <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}">
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.7.0/css/all.css')}}"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Plugin styles -->
    <!-- Your custom styles -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    
</head>
<body class="fixed-nav sticky-footer" id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
        <a class="navbar-brand" href="http://localhost:8000/admin/home"><img src="{{asset('img/trungphattravel.png')}}" alt="" width="150" height="36"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            @can('admin')

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link" href="{{route('users.index')}}">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">Quản lý tài khoản</span>
                </a>

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link" href="{{route('loaitours.index')}}">
                    <i class="fa fa-fw fa-pencil"></i>
                    <span class="nav-link-text">Quản lý loại tour</span>
                </a>

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link" href="{{route('tours.index')}}">
                    <i class="fa fa-fw fa-globe"></i>
                    <span class="nav-link-text">Quản lý tour</span>
                </a>

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link" href="{{route('diadiems.index')}}">
                    <i class="fa fa-fw fa-map-marker"></i>
                    <span class="nav-link-text">Quản lý địa điểm</span>
                </a>

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link" href="{{route('blogs.index')}}">
                    <i class="fa fa-fw fa-newspaper"></i>
                    <span class="nav-link-text">Quản lý blogs</span>
                </a>

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link" href="{{route('khuyenmais.index')}}">
                    <i class="fa fa-fw fa-tags"></i>
                    <span class="nav-link-text">Quản lý khuyến mãi</span>
                </a>

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link" href="{{route('nhacungcaps.index')}}">
                    <i class="fa fa-fw fa-id-card-o"></i>
                    <span class="nav-link-text">Quản lý nhà cung cấp</span>
                </a>

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link" href="{{route('khachhangs.index')}}">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">Thông tin khách hàng</span>
                </a>

                @endcan

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link" href="{{route('statistic.index')}}">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Thống kê</span>
                </a>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents">
                        <i class="fa fa-fw fa-shopping-cart"></i>
                        <span class="nav-link-text">Quản lý đơn hàng</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                        <a href="{{route('donhangs.index')}}">Chưa duyệt</a>
                        </li>
                        <li>
                        <a href="{{route('da_duyet')}}">Đã duyệt</a>
                        </li>
                        <li>
                        <a href="{{route('khong_duyet')}}">Không duyệt</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item">

                    <nav id="navbar-custom" class="navbar navbar-dark navbar-expand-sm">
                        <div class="collapse navbar-collapse" id="navbar-list-4">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/storage/{{Auth::user()->image}}" width="40" height="40" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    
                                    <center>
                                        <h4 class="dropdown-header text-primary">
                                            @auth
                                                {{Auth::user()->ho}} {{Auth::user()->ten}}
                                            @endauth
                                        </h4>
                                        <p class="dropdown-header text-primary">{{Auth::user()->email}}</p>
                                    </center>
                                    
                                    <a style="cursor: pointer" class="dropdown-item" data-toggle="modal" data-target="#editmodel">
                                        <i class="fa fa-fw fa-user"></i>Chỉnh sửa thông tin
                                    </a>
                                    <a style="cursor: pointer" class="dropdown-item" data-toggle="modal" data-target="#changepassmodel">
                                        <i class="fa fa-fw fa-key"></i>Đổi mật khẩu
                                    </a>
                                    <a style="cursor: pointer" class="dropdown-item" data-toggle="modal" data-target="#logoutmodal">
                                        <i class="fa fa-fw fa-sign-out"></i>Đăng xuất
                                    </a>
                                </div>
                            </li>   
                            </ul>
                        </div>
                    </nav>

                </li>
            </ul>
        </div>
    </nav>
    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                
                
                </li>
                <li class="breadcrumb-item active">@section('header')@show</li>
            </ol>
            <div class="container">
                @yield('content')
            </div>
        </div>

        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
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
            <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin tài khoản</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('users.update', ['user'=>Auth::user()])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_update" value="user_update_info">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Họ:</label>
                            <input name="ho" type="text" class="form-control"><br>
                            @if($errors->has('ho')) {{$errors->first('ho')}} @endif
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tên:</label>
                            <input name="ten" type="text" class="form-control"><br>
                            @if($errors->has('ten')) {{$errors->first('ten')}} @endif
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input" id="ful_img_layout" type="file" accept="image/*" name="image"><br>
                                <label class="custom-file-label" for="customFile">Ảnh đại diện</label><br>
                            </div><br>
                            <img id="img_upload_layout" width="50" height="50" class="rounded-circle"><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Change Pass -->
            <div class="modal fade" id="changepassmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('users.update', ['user'=>Auth::user()])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_update" value="user_update_pass">
                        <div class="form-group">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Mật khẩu mới:</label>
                            <input name="password" type="text" class="form-control"><br>
                            @if($errors->has('password')) {{$errors->first('password')}} @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
    
    
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <!-- <script src="{{asset('customer/js/popper.min.js')}}"></script> -->
    <!-- <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('vendor/jquery/jquery.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/admin.js')}}"></script>

    <script type="text/javascript">
        document.getElementById('ful_img_layout').onchange = function (e) {
            document.getElementById('img_upload_layout').src = URL.createObjectURL(e.target.files[0]);
        }

        document.querySelector(".number").addEventListener("keypress", function (evt) {
            if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
            {
                evt.preventDefault();
            }
        });
        CKEDITOR.replace('editor');
    </script>

    <header>
        <script type="text/javascript">
            function checkDelete() {
                return confirm('Bạn có chắc chắn muốn xóa');
            }

            function checkRestore() {
                return confirm('Bạn có chắc chắn muốn khôi phục');
            }

            function checkUpdate() {
                return confirm('Bạn có chắc chắn muốn cập nhật');
            }
        </script>
    </header>
</body>
</html>