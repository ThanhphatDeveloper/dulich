@extends('layouts.customer')

@section('title', $tour->tentour)

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
								<span id="gia">{{number_format($tour->gia, 0, '', ',')}} VNĐ <small>người</small></span>
							</div>
							<div class="form-group input-dates">
								<input id="customer_ten" class="form-control" type="text" placeholder="Họ và tên">
								<p id="noti_ten" class="noti"></p>
							</div>

							<div class="form-group input-dates">
								<input id="customer_email" class="form-control" type="text" placeholder="Email">
								<p id="noti_email" class="noti"></p>
							</div>

							<div class="form-group input-dates">
								<input id="customer_sdt" class="form-control" type="text" placeholder="Số điện thoại">
								<p id="noti_sdt" class="noti"></p>
							</div>

							<div class="form-group input-dates">
								<input id="customer_sokhach" id="number" min="1" class="form-control" type="number" placeholder="Số người">
								<p id="noti_sokhach" class="noti"></p>
							</div>

							<div class="form-group input-dates">
								<input id="customer_makhuyenmai" class="form-control" type="text" placeholder="Mã khuyến mãi">
							</div>

							<div class="form-group">
								<button id="btn_khuyenmai" type="button">
									Tính tiền
								</button>
							</div>

							<div class="form-group">
								<p id="giakhuyenmai"></p>
							</div>

							<div class="form-group">
								<p id="giadatcoc"></p>
							</div>

							<a href="cart-1.html" class="btn_1 full-width purchase">Tư vấn</a>

							<form id="qr_momo" action="{{url('/momo_payment_qr')}}" method="post">
								@csrf
								<input type="hidden" name="total_momo" value="{{$tour->gia}}"><br>
								<button id="btn_qr_momo" name="payUrl" class="glow-on-hover" type="submit">Đặt cọc bằng QR MOMO</button>
							</form>

							<form id="form_vnpay" action="{{url('/vnpay_payment')}}" method="post">
								@csrf
								<input type="hidden" name="total_vnpay" value="{{$tour->gia}}"><br>
								<button id="btn_vnpay" name="redirect" class="glow-on-hover" type="submit">Đặt cọc bằng VNPAY</button>
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

		.noti{
			color: red;
		}
	</style>

	<script src="{{asset('vendor/jquery/jquery.js')}}"></script>
	<script>

	$(document).ready(function () {


		$("#btn_khuyenmai").click(function () {

			var makhuyenmai = $("#customer_makhuyenmai").val().trim();
			var array = @json($lst_km);
			var sokhach = $("#customer_sokhach").val();

			if(makhuyenmai == ''){
				var gia = {{$tour->gia}} * sokhach;
				convert = gia.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });

				$("#giakhuyenmai").text('Giá của tour là: '+convert);
				$("#giadatcoc").text('Giá đặt cọc là: '+(gia*0.7).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }));

				return;
			}

			if(sokhach == ''){
				$("#noti_sokhach").text('Vui lòng nhập số lượng khách');
				return;
			}

			for(i=0;i<array.length;i++){
				if(array[i].makhuyenmai==makhuyenmai && array[i].hansudung>0){

					var gia = {{$tour->gia}} * sokhach - array[i].mucgiam;

					convert = gia.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });

					$("#giakhuyenmai").text('Giá của tour là: '+convert);
					$("#giadatcoc").text('Giá đặt cọc là: '+(gia*0.7).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }));

					return;
				}
			}

			$("#giakhuyenmai").text('Mã khuyến mãi không hợp lệ');
		});

		$("#btn_qr_momo").click(function () {

			var ten = $("#customer_ten").val();
			var email = $("#customer_email").val();
			var sdt = $("#customer_sdt").val();
			var sokhach = $("#customer_sokhach").val();
			var makhuyenmai = $("#customer_makhuyenmai").val().trim();

			if(sokhach == '' || ten == '' || email == '' || sdt == ''){
				$("#btn_qr_momo").attr("type", "button");
				if(sokhach == ''){
					$("#noti_sokhach").text('Vui lòng nhập số lượng khách');
				}
				if(ten == ''){
					$("#noti_ten").text('Vui lòng nhập tên của bạn');
				}
				if(email == ''){
					$("#noti_email").text('Vui lòng nhập email của bạn');
				}
				if(sdt == ''){
					$("#noti_sdt").text('Vui lòng nhập số điện thoại của bạn');
				}
				return;
			}

			$("#btn_qr_momo").attr("type", "submit");

			$('<input>').attr({
				type: 'hidden',
				name: 'makhuyenmai',
				value: makhuyenmai,
			}).appendTo('#qr_momo');

			$('<input>').attr({
				type: 'hidden',
				name: 'tour_id',
				value: {{$tour->id}},
			}).appendTo('#qr_momo');

			$('<input>').attr({
				type: 'hidden',
				name: 'ten',
				value: ten,
			}).appendTo('#qr_momo');

			$('<input>').attr({
				type: 'hidden',
				name: 'email',
				value: email,
			}).appendTo('#qr_momo');

			$('<input>').attr({
				type: 'hidden',
				name: 'sdt',
				value: sdt,
			}).appendTo('#qr_momo');

			$('<input>').attr({
				type: 'hidden',
				name: 'sokhach',
				value: sokhach,
			}).appendTo('#qr_momo');

			$('<input>').attr({
				type: 'hidden',
				name: 'gioitinh',
				value: 'Nam',
			}).appendTo('#qr_momo');

			$("#qr_momo").submit();

		});

		$("#btn_vnpay").click(function () {

			var ten = $("#customer_ten").val();
			var email = $("#customer_email").val();
			var sdt = $("#customer_sdt").val();
			var sokhach = $("#customer_sokhach").val();
			var makhuyenmai = $("#customer_makhuyenmai").val();

			$('<input>').attr({
				type: 'hidden',
				name: 'makhuyenmai',
				value: makhuyenmai,
			}).appendTo('#form_vnpay');

			$('<input>').attr({
				type: 'hidden',
				name: 'tour_id',
				value: {{$tour->id}},
			}).appendTo('#form_vnpay');

			$('<input>').attr({
				type: 'hidden',
				name: 'ten',
				value: ten,
			}).appendTo('#form_vnpay');

			$('<input>').attr({
				type: 'hidden',
				name: 'email',
				value: email,
			}).appendTo('#form_vnpay');

			$('<input>').attr({
				type: 'hidden',
				name: 'sdt',
				value: sdt,
			}).appendTo('#form_vnpay');

			$('<input>').attr({
				type: 'hidden',
				name: 'sokhach',
				value: sokhach,
			}).appendTo('#form_vnpay');

			$('<input>').attr({
				type: 'hidden',
				name: 'gioitinh',
				value: 'Nam',
			}).appendTo('#form_vnpay');

		});

		$("#btn_atm_momo").click(function () {

			var ten = $("#customer_ten").val();
			var email = $("#customer_email").val();
			var sdt = $("#customer_sdt").val();
			var sokhach = $("#customer_sokhach").val();
			var makhuyenmai = $("#customer_makhuyenmai").val().trim();

			if(sokhach == '' || ten == '' || email == '' || sdt == ''){
				$("#atm_momo").attr("type", "button");
				if(sokhach == ''){
					$("#noti_sokhach").text('Vui lòng nhập số lượng khách');
				}
				if(ten == ''){
					$("#noti_ten").text('Vui lòng nhập tên của bạn');
				}
				if(email == ''){
					$("#noti_email").text('Vui lòng nhập email của bạn');
				}
				if(sdt == ''){
					$("#noti_sdt").text('Vui lòng nhập số điện thoại của bạn');
				}
				return;
			}

			$("#atm_momo").attr("type", "submit");

			$('<input>').attr({
				type: 'hidden',
				name: 'makhuyenmai',
				value: makhuyenmai,
			}).appendTo('#atm_momo');

			$('<input>').attr({
				type: 'hidden',
				name: 'tour_id',
				value: {{$tour->id}},
			}).appendTo('#atm_momo');

			$('<input>').attr({
				type: 'hidden',
				name: 'ten',
				value: ten,
			}).appendTo('#atm_momo');

			$('<input>').attr({
				type: 'hidden',
				name: 'email',
				value: email,
			}).appendTo('#atm_momo');

			$('<input>').attr({
				type: 'hidden',
				name: 'sdt',
				value: sdt,
			}).appendTo('#form_vnpay');

			$('<input>').attr({
				type: 'hidden',
				name: 'sokhach',
				value: sokhach,
			}).appendTo('#atm_momo');

			$('<input>').attr({
				type: 'hidden',
				name: 'gioitinh',
				value: 'Nam',
			}).appendTo('#atm_momo');

		});

	});

	</script>
@endsection