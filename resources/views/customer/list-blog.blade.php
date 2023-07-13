@extends('layouts.customer')

@section('title', 'Bài viết')

@section('content')

<main>
		<section class="hero_in general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Blog nổi bật</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">

                    @foreach($lst as $b)
                        <article class="blog wow fadeIn">
                            <div class="row g-0">
                                <div class="col-lg-7">
                                    <figure>
                                        <a href="{{route('customer_blogs.show', $b->id)}}"><img src="{{$b->anhdaidien}}" alt="">
                                            <div class="preview"><span>Chi tiết</span></div>
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-lg-5">
                                    <div class="post_info">
                                        <h3><a href="{{route('customer_blogs.show', $b->id)}}">{{$b->tieude}}</a></h3>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach

					<nav aria-label="...">
						<ul class="pagination pagination-sm">
							<li class="page-item disabled">
                                {{$lst->appends(request()->all())->links()}}
							</li>
						</ul>
					</nav>
					<!-- /pagination -->
				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<div class="widget">
						<form method="get" action="{{route('customer_blogs.index')}}">
							<div class="form-group">
								<input name="key" value="{{old('key')}}" type="text" name="search" id="search" class="form-control" placeholder="Tìm bài viết">
							</div>
							<button type="submit" id="submit" class="btn_1 rounded"> Tìm kiếm</button>
						</form>
					</div>
					<!-- /widget -->
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>

@endsection