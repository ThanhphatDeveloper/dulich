@extends('layouts.customer')

@section('title', 'Trang chủ')

@section('content')

<main>
		<section class="hero_in tours_detail">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>{{$tour->tentour}}</h1>
				</div>
				<span class="magnific-gallery">
					<a href="../storage/{{$tour->imagelarge}}" class="btn_photos" title="" data-effect="mfp-zoom-in">Xem ảnh</a>
				</span>
			</div>
		</section>
		<!--/hero_in-->

		<div class="bg_color_1">
			<nav class="secondary_nav sticky_horizontal">
				<div class="container">
				</div>
			</nav>
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<section id="description">
							<h2>Mô tả</h2>

							<div class="post-content">
							
								{!!$tour->mota!!}

                        	</div>

							<h3>Ảnh lên quan</h3>
							<div class="pictures_grid magnific-gallery clearfix">
								@foreach($lst_img as $i)
									@if($i->tour_id == 10)
							    		<figure>
											<a href="../storage/{{$i->image}}" title="" data-effect="mfp-zoom-in">
												<img src="../storage/{{$i->image}}" alt="">
											</a>
										</figure>
							    	@endif
								@endforeach
							</div>
							<!-- /pictures -->
							
							<hr>

							
							<hr>
							
							<!-- End Map -->
						</section>
						<!-- /section -->
					
						<!-- /section -->
						<hr>
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail booking">
							<div class="price">
								<span>{{number_format($tour->gia, 0, '', ',')}} VNĐ <small>người</small></span>
							</div>
							<div class="form-group input-dates">
								<input class="form-control" type="text" name="dates" placeholder="When..">
								<i class="icon_calendar"></i>
							</div>
							<div class="panel-dropdown">
								<a href="#">Guests <span class="qtyTotal">1</span></a>
								<div class="panel-dropdown-content right">
									<div class="qtyButtons">
										<label>Adults</label>
										<input type="text" name="qtyInput" value="1">
									</div>
									<div class="qtyButtons">
										<label>Childrens</label>
										<input type="text" name="qtyInput" value="0">
									</div>
								</div>
							</div>
							<a href="cart-1.html" class="btn_1 full-width purchase">Purchase</a>

							<form action="{{url('/momo_payment_qr')}}" method="post">
								@csrf
								<input type="hidden" name="total_momo" value="{{$tour->gia}}"><br>

								<button name="payUrl" class="glow-on-hover" type="submit">Thanh toán QR MOMO</button>
							</form>

							<form action="{{url('/vnpay_payment')}}" method="post">
								@csrf
								<input type="hidden" name="total_vnpay" value="{{$tour->gia}}"><br>
								<button style="margin-right: 15px" name="redirect" class="glow-on-hover" type="submit">Thanh toán VNPAY</button>
							</form>
						</div>
					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>

	<style>
		.hero_in.tours_detail:before {
			background: url('../storage/{{$tour->imagelarge}}') center center no-repeat;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
	</style>

@endsection