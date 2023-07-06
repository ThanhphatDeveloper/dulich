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
							<li>
								<div class="alignleft">
									<a href="#0"><img src="img/blog-5.jpg" alt=""></a>
								</div>
								<small>11.08.2016</small>
								<h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
							</li>
							<li>
								<div class="alignleft">
									<a href="#0"><img src="img/blog-6.jpg" alt=""></a>
								</div>
								<small>11.08.2016</small>
								<h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
							</li>
							<li>
								<div class="alignleft">
									<a href="#0"><img src="img/blog-4.jpg" alt=""></a>
								</div>
								<small>11.08.2016</small>
								<h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
							</li>
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