@extends('layouts.customer')

@section('title', 'Danh sách tour')

@section('content')

<main>
		
		<section class="hero_in tours">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Trung phat travel</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->
		
		<div class="filters_listing sticky_horizontal">
			<div class="container">
				
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->
		
		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

		<div class="container margin_60_35">
			
		<div class="wrapper-grid">
			<div class="row">
				@foreach($lst as $t)
				<!-- /box_grid -->
					<div class="col-xl-4 col-lg-6 col-md-6">
						<div class="box_grid">
							<figure>
								<a href="{{route('customer_tours.show',$t->id)}}">
									<img src="storage/{{$t->avatar}}" class="img-fluid" alt="" width="800" height="533">
									<div class="read_more"><span>Chi tiết</span>
									</div>
								</a>
							</figure>
							<div class="wrapper">
								<h3><a href="{{route('customer_tours.show',$t->id)}}">{{$t->tentour}}</a></h3>
								<span class="price">Chỉ từ <strong>{{number_format($t->gia, 0, '', ',')}} VNĐ</strong> /người</span>
							</div>
						</div>
					</div>
				@endforeach
				<!-- /box_grid -->
			</div>
			<!-- /row -->
			</div>
			<!-- /wrapper-grid -->

			<nav aria-label="...">
				<ul class="pagination pagination-sm">
					<li class="page-item disabled">
						{{$lst->appends(request()->all())->links()}}
					</li>
				</ul>
			</nav>
			
			<!-- <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p> -->
			
		</div>
		<!-- /container -->
		
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-md-4">
						<a href="{{url('/contact')}}" class="boxed_list">
							<i class="pe-7s-help2"></i>
							<h4>Bạn cần giúp đỡ? Liên hệ chúng tôi</h4>

						</a>
					</div>
					<div class="col-md-4">
						<a href="{{url('/policy')}}" class="boxed_list">
							<i class="pe-7s-wallet"></i>
							<h4>Quy định thanh toán</h4>
						</a>
					</div>
					<div class="col-md-4">
						<a href="{{url('/payment')}}" class="boxed_list">
							<i class="pe-7s-note2"></i>
							<h4>Bảo mật và điều khoản</h4>
						</a>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
		
	</main>

@endsection