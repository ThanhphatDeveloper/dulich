@extends('layouts.customer')

@section('title', 'Trang chủ')

@section('content')

	<main>
		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container" method="get" action="">
					<h3>Tìm Trải Nghiệm Cho Bạn</h3>
					<p>Khám phá các tour du lịch hàng đầu trên khắp thế giới</p>
					<form method="get" action="{{route('customer_tours.index')}}">
						<div id="custom-search-input">
							<div class="input-group">
								<input class=" search-query" type="text" name="key" value="{{old('key')}}" placeholder="Ví dụ: tên tour, địa điểm,...">
								<input type="submit" class="btn_search" value="Tìm kiếm">
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- /hero_single -->

		<div class="container container-custom margin_80_0">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Tour Mới Nhất</h2>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				@foreach($lst as $t)
					<div class="item">
						<div class="box_grid">
							<figure>
								
								<a href="{{route('customer_tours.show', ['customer_tour'=>$t])}}"><img src="storage/{{$t->avatar}}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Chi tiết</span></div></a>
								
							</figure>
							<div class="wrapper">
								<h3><a href="{{route('customer_tours.show', ['customer_tour'=>$t])}}">{{$t->tentour}}</a></h3>
								<span class="price">Chỉ từ <strong>{{number_format($t->gia, 0, '', ',')}} VNĐ </strong> /người</span>
							</div>
							
						</div>
					</div>
				@endforeach
				
			</div>
			<!-- /carousel -->
			<p class="btn_home_align"><a href="{{route('customer_tours.index')}}" class="btn_1 rounded">Xem tất cả tour</a></p>
			<hr class="large">
		</div>
		<!-- /container -->
		
		<div class="container container-custom margin_30_95">
			
			<!-- /section -->
			
			
			<!-- /section -->

			<div class="banner mb-0">
				<div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
					<div>
						<small></small>
						<h3>Lĩnh Vực Hoạt Động<br>Trong nước & Ngoài nước</h3>
						<p>Cung cấp nhiều tour chất lượng hàng đầu Việt Nam</p>
						<a href="adventure.html" class="btn_1">Xem thêm</a>
					</div>
				</div>
				<!-- /wrapper -->
			</div>
			<!-- /banner -->

		</div>
		<!-- /container -->

		<div class="bg_color_1">
			<div class="container margin_80_55">
				<div class="main_title_2">
					<span><em></em></span>
					<h3>Tin tức và sự kiện</h3>
					<p>Những địa điểm được yêu thích năm 2023.</p>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_1.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Đà Lạt</li>
								<li>20/06/2023</li>
							</ul>
							<h4>Đại hội âm nhạc chưa từng có</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_2.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Jhon Doe</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Duo eius postea suscipit ad</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_3.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Luca Robinson</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Elitr mandamus cu has</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_4.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Paula Rodrigez</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Id est adhuc ignota delenit</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
				</div>
				<!-- /row -->
				<p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">Xem thêm</a></p>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->

		<div class="call_section">
			<div class="container clearfix">
				<div class="col-lg-5 col-md-6 float-end wow position-relative" data-wow-offset="250">
					<div class="block-reveal">
						<div class="block-vertical"></div>
						<div class="box_1">
							<h3>Tầm Nhìn - Sứ Mệnh</h3>
							<p>Như tên thương hiệu đã khẳng định Trung Phát Travel và khẩu hiệu công ty đã lựa chọn “Du lịch Châu Á, Khám phá Mỹ – Úc – Âu”. Công ty Trung Phát Travel mong muốn phát triển bền vững để Trung Phát Travel đứng vào hàng ngũ 10 công ty du lịch hàng đầu của Việt Nam vào năm 2023. </p>
							<a href="#0" class="btn_1 rounded">Xem thêm</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/call_section-->
	</main>

@endsection