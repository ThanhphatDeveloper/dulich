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
								<input id="customer_sdt" maxlength="10"
								 class="form-control" type="text" placeholder="Số điện thoại"
								 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
								<p id="noti_sdt" class="noti"></p>
							</div>

							<div class="form-group input-dates">
								<input id="customer_sokhach" min="1" class="form-control" type="number" placeholder="Số người">
								<p id="noti_sokhach" class="noti"></p>
							</div>

							<div class="container1">
								<form class="namnu">
									<label class="nu">
										<input type="radio" name="radio" checked="" value="Nam">
										<span>Nam</span>
									</label>
									<label class="nu">
										<input type="radio" name="radio" value="Nữ">
										<span>Nữ</span>
									</label>
								</form>
							</div><br>

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

							<a target="_blank" href="{{url('/contact')}}" class="btn_1 full-width purchase">Tư vấn</a>

							<form id="qr_momo" action="{{url('/momo_payment_qr')}}" method="post">
								@csrf
								<input type="hidden" name="total_momo" value="{{$tour->gia}}"><br>
								<button id="btn_qr_momo" name="payUrl" class="glow-on-hover" type="submit">Đặt cọc bằng QR MOMO</button>
								<p id="noti_momo" class="noti"></p>
							</form>

							<form id="form_vnpay" action="{{url('/vnpay_payment')}}" method="post">
								@csrf
								<input type="hidden" name="total_vnpay" value="{{$tour->gia}}"><br>
								<button id="btn_vnpay" name="redirect" class="glow-on-hover" type="submit">Đặt cọc bằng VNPAY</button>
								<p id="noti_vnpay" class="noti"></p>
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

		.container1 form {
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  margin: 0 20px;
}

.namnu .nu{
margin: auto 40px;
}



.container1 label {
  display: flex;
  cursor: pointer;
  font-weight: 500;
  position: relative;
  overflow: hidden;
  margin-bottom: 0.375em;
}

.container1  label input {
  position: absolute;
  left: -9999px;
}

.container1 label input:checked + span {
  background-color: #414181;
  color: white;
}

.container1 label input:checked + span:before {
  box-shadow: inset 0 0 0 0.4375em #00005c;
}

.container1 label span {
  display: flex;
  align-items: center;
  padding: 0.375em 0.75em 0.375em 0.375em;
  border-radius: 99em;
  transition: 0.25s ease;
  color: #414181;
}

.container1 label span:hover {
  background-color: #d6d6e5;
}

.container1 label span:before {
  display: flex;
  flex-shrink: 0;
  content: "";
  background-color: #fff;
  width: 1.5em;
  height: 1.5em;
  border-radius: 50%;
  margin-right: 0.375em;
  transition: 0.25s ease;
  box-shadow: inset 0 0 0 0.125em #00005c;
}

	</style>

	<script src="{{asset('vendor/jquery/jquery.js')}}"></script>
	<script>

	document.querySelector("#customer_sokhach").addEventListener("keypress", function (evt) {
		if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
		{
			evt.preventDefault();
		}
	});

	function checkEmail(emailAddress) {
		var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
		var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
		var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
		var sQuotedPair = '\\x5c[\\x00-\\x7f]';
		var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
		var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
		var sDomain_ref = sAtom;
		var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
		var sWord = '(' + sAtom + '|' + sQuotedString + ')';
		var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
		var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
		var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
		var sValidEmail = '^' + sAddrSpec + '$'; // as whole string

		var reValidEmail = new RegExp(sValidEmail);

		return reValidEmail.test(emailAddress);
	}

	$(document).ready(function () {


		$("#btn_khuyenmai").click(function () {

			var makhuyenmai = $("#customer_makhuyenmai").val().trim();
			var array = @json($lst_km);
			var sokhach = $("#customer_sokhach").val();

			if(makhuyenmai == ''){
				var gia = {{$tour->gia}} * sokhach;
				convert = gia.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });

				$("#giakhuyenmai").text('Giá của tour là: '+convert);

				if((gia*0.7) > 1000000000){
					$("#giadatcoc").text('Giá đặt cọc là: '+(gia*0.7).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })+' (không áp dụng đặt cọc online vui lòng liên hệ chúng tôi để đặt tour)');
					return;
				}

				if((gia*0.7) > 50000000){
					$("#giadatcoc").text('Giá đặt cọc là: '+(gia*0.7).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })+' (chỉ áp dụng cho vnpay)');
				}else{
					$("#giadatcoc").text('Giá đặt cọc là: '+(gia*0.7).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }));
				}

				return;
			}

			if(sokhach == ''){
				$("#noti_sokhach").text('Vui lòng nhập số lượng khách');
				return;
			}

			for(i=0;i<array.length;i++){
				if(array[i].makhuyenmai==makhuyenmai && array[i].hansudung>0 && array[i].giatoithieu <= {{$tour->gia}}){

					var gia = {{$tour->gia}} * sokhach - array[i].mucgiam;

					convert = gia.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });

					$("#giakhuyenmai").text('Giá của tour là: '+convert);

					if((gia*0.7) > 1000000000){
						$("#giadatcoc").text('Giá đặt cọc là: '+(gia*0.7).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })+' (không áp dụng đặt cọc online vui lòng liên hệ chúng tôi để đặt tour)');
						return;
					}

					if((gia*0.7) > 50000000){
						$("#giadatcoc").text('Giá đặt cọc là: '+(gia*0.7).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })+'(chỉ áp dụng cho vnpay)');
					}else{
						$("#giadatcoc").text('Giá đặt cọc là: '+(gia*0.7).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }));
					}

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
			var $gioitinh = $('input[name="radio"]:checked').val();

			var array = @json($lst_km);

			if(makhuyenmai == ''){
				var gia = {{$tour->gia}} * sokhach;

				if((gia*0.7) > 50000000){
					$("#btn_qr_momo").attr("type", "button");
					$("#noti_momo").text('Không thể thanh toán bằng momo');
				}

				return;
			}

			for(i=0;i<array.length;i++){
				if(array[i].makhuyenmai==makhuyenmai && array[i].hansudung>0 && array[i].giatoithieu <= {{$tour->gia}}){

					var gia = {{$tour->gia}} * sokhach - array[i].mucgiam;

					if((gia*0.7) > 50000000){
						$("#btn_qr_momo").attr("type", "button");
						$("#noti_momo").text('Không thể thanh toán bằng momo');
					}

					return;
				}
			}

			if(sokhach == '' || ten == '' || email == '' || sdt == '' || sdt.length != 10 || (checkEmail(email) == false)){
				$("#btn_qr_momo").attr("type", "button");
				if(sokhach == ''){
					$("#noti_sokhach").text('Vui lòng nhập số lượng khách');
				}
				if(ten == ''){
					$("#noti_ten").text('Vui lòng nhập tên của bạn');
				}
				if(checkEmail(email) == false){
					$("#noti_email").text('Email không hợp lệ');
				}
				if(email == ''){
					$("#noti_email").text('Vui lòng nhập email của bạn');
				}
				if(sdt.length != 10){
					$("#noti_sdt").text('Số điện thoại không hợp lệ');
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
				value: $gioitinh,
			}).appendTo('#qr_momo');

			$("#qr_momo").submit();

		});

		$("#btn_vnpay").click(function () {

			var ten = $("#customer_ten").val();
			var email = $("#customer_email").val();
			var sdt = $("#customer_sdt").val();
			var sokhach = $("#customer_sokhach").val();
			var makhuyenmai = $("#customer_makhuyenmai").val().trim();
			var $gioitinh = $('input[name="radio"]:checked').val();

			var array = @json($lst_km);

			if(makhuyenmai == ''){
				var gia = {{$tour->gia}} * sokhach;

				if((gia*0.7) > 1000000000){
					$("#btn_vnpay").attr("type", "button");
					$("#noti_vnpay").text('Không thể thanh toán bằng vnpay');
					return;
				}
			}

			for(i=0;i<array.length;i++){
				if(array[i].makhuyenmai==makhuyenmai && array[i].hansudung>0 && array[i].giatoithieu < {{$tour->gia}}){

					var gia = {{$tour->gia}} * sokhach - array[i].mucgiam;

					if((gia*0.7) > 1000000000){
						$("#btn_vnpay").attr("type", "button");
						$("#noti_vnpay").text('Không thể thanh toán bằng vnpay');
						return;
					}
				}
			}

			if(sokhach == '' || ten == '' || email == '' || sdt == '' || sdt.length != 10 || checkEmail(email) == false){
				$("#btn_vnpay").attr("type", "button");
				if(sokhach == ''){
					$("#noti_sokhach").text('Vui lòng nhập số lượng khách');
				}
				if(ten == ''){
					$("#noti_ten").text('Vui lòng nhập tên của bạn');
				}
				if(checkEmail(email) == false){
					$("#noti_email").text('Email không hợp lệ');
				}
				if(email == ''){
					$("#noti_email").text('Vui lòng nhập email của bạn');
				}
				if(sdt.length != 10){
					$("#noti_sdt").text('Số điện thoại không hợp lệ');
				}
				if(sdt == ''){
					$("#noti_sdt").text('Vui lòng nhập số điện thoại của bạn');
				}
				return;
			}

			$("#btn_vnpay").attr("type", "submit");

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
				value: $gioitinh,
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