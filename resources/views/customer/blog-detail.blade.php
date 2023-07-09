@extends('layouts.customer')

@section('title', 'Bài viết')

@section('content')

<main>
		<section class="hero_in general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Trung Phat Blog</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">
					<div class="bloglist singlepost">
						<p><img alt="" class="img-fluid" src="img/blog-single.jpg"></p>
						<h1>{{$blog->tieude}}</h1>
						<div class="postmeta">
							<ul>
								<li><a href="#"><i class="icon_pencil-edit"></i> Admin</a></li>
							</ul>
						</div>
						<!-- /post meta -->
						<div class="post-content">
							
                            {!!$blog->noidung!!}

                        </div>
						<!-- /post -->
					</div>
				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<div class="widget">
						<form>
							<div class="form-group">
								<input type="text" name="search" id="search" class="form-control" placeholder="Tìm bài viết">
							</div>
							<button type="submit" id="submit" class="btn_1 rounded"> Tìm kiếm</button>
						</form>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Tour liên quan</h4>
						</div>
						<ul class="comments-list">
							@foreach($lst_tlq as $tlq)
								@foreach($lst_tour as $t)
									@if($tlq->tour_id == $t->id)
										<li>
											<div class="alignleft">
												<a href="{{route('customer_tours.show',$t->id)}}">
													<img src="http://localhost:8000/storage/{{$t->avatar}}">
												</a>
											</div>
											<h3>
												<a href="{{route('customer_tours.show',$t->id)}}" title="">
													{{$t->tentour}}
												</a>
											</h3>
										</li>
									@endif
								@endforeach
							@endforeach
						</ul>
					</div>

				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>

@endsection