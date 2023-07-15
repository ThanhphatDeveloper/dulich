<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    <title>@yield('title')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('customer/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('customer/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('customer/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('customer/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('customer/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}">
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap')}}" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('customer/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('customer/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('customer/css/vendors.css')}}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="{{asset('customer/css/blog.css')}}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="{{asset('css/blog.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('customer/css/custom.css')}}" rel="stylesheet">

</head>

<body>
	
	<div id="page">
		
	<header class="header menu_fixed">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Page Preload -->
		<div id="logo">
			<a href="http://localhost:8000">
				<img src="{{asset('img/trungphattravel.png')}}" width="150" height="36" alt="" class="logo_normal">
				<img src="{{asset('customer/img/custom/trungphattravel.png')}}" width="150" height="36" alt="" class="logo_sticky">
			</a>
		</div>
		<!-- /top_menu -->
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<nav id="menu" class="main-menu">
			<ul>
				<li><span><a href="{{url('/')}}">Trang chủ</a></span></li>
				<li>
					<span><a href="{{route('customer_tours.index')}}">Tour</a></span>
					<ul>
						<li>
							<span><a href="{{route('type','ngoài nước')}}">Tour ngoài nước</a></span>
						</li>
						<li>
							<span><a href="{{route('type','trong nước')}}">Tour trong nước</a></span>
						</li>
					</ul>
				</li>
				<li>
					<span>
						<a href="{{route('customer_blogs.index')}}">Blog</a>
					</span>
				</li>
				<li><span><a href="{{url('/policy')}}">Quy định thanh toán</a></span></li>
				<li><span><a href="{{url('/payment')}}">Bảo mật và điều khoản</a></span></li>
				<li><span><a href="{{url('/contact')}}">Liên hệ</a></span></li>
			</ul>
		</nav>
	</header>
	
	@yield('content')
	
	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-5 col-md-12 pe-5">
					<p><img src="{{asset('img/trungphattravel.png')}}" width="150" height="36" alt=""></p>
					<p>Là một trong những đơn vị hoạt động kinh doanh trong lĩnh vực Dịch vụ và Du lịch tại Việt Nam, Trung Phát Travel nhanh chóng được đánh giá là một công ty trẻ nhưng chuyên nghiệp ngay từ nền tảng. Xây dựng với một cơ cấu 90% nhân viên từng là các “thủ lĩnh” xuất sắc của các công ty Du lịch hàng đầu Việt Nam, Trung Phát Travel luôn thấu hiểu những giá trị cốt yếu của du lịch. Trên bước đường trưởng thành, Trung Phát Travel không ngừng nổ lực tìm kiếm và thiết kế những tour du lịch với hình thức độc đáo và mới lạ, nhằm đưa thế giới gần hơn với du khách.</p>
					<div class="follow_us">
						<ul>
							<li>Follow us</li>
							<li><a target="_blank" href="https://www.facebook.com/Deed.027"><i class="ti-facebook"></i></a></li>
							<li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
							<li><a href="#0"><i class="ti-google"></i></a></li>
							<li><a href="#0"><i class="ti-pinterest"></i></a></li>
							<li><a target="_blank" href="https://www.instagram.com/deed_27"><i class="ti-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ms-lg-auto">
					<h5>Thông tin về chúng tôi</h5>
					<ul class="links">
						<li><a href="{{url('/policy')}}">Quy định thanh toán</a></li>
						<li><a href="{{route('customer_blogs.index')}}">Blog</a></li>
						<li><a href="{{url('/contact')}}">Contacts</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://353110711"><i class="ti-mobile"></i> +84 353 110 711</a></li>
						<li><a href="nguyenthanhphatdeveloper@gmail.com"><i class="ti-email"></i> nguyenthanhphat@id.vn</a></li>
					</ul>
					
				</div>
			</div>
			<!--/row-->
			<hr>
			
	</footer>
	<!--/footer-->
	</div>
	
	<div id="toTop"></div><!-- Back to top button -->


	
	<!-- COMMON SCRIPTS -->
    <script src="{{asset('customer/js/common_scripts.js')}}"></script>
    <script src="{{asset('customer/js/main.js')}}"></script>
	<script src="{{asset('customer/phpmailer/validate.js')}}"></script>

	<script>
		$(document).ready(function() {
			'use strict';
			$.cookieBar({
				fixed: true
			});
		});

		document.querySelector("#number").addEventListener("keypress", function (evt) {
            if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
            {
                evt.preventDefault();
            }
        });
	</script>
	
  
</body>
</html>