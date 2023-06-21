@extends('layout')
@section('content')
<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="blog-post-area">
						<h2 class="title text-center">Tin tức cập nhật</h2>
						@foreach($news as $key => $news)
						<div class="single-blog-post">
							<a href="">
								<h2>{{$news->tittle}}</h2>
							</a>
							<div class="post-meta">
								<ul>
									
									<li><i class="fa fa-calendar"></i> {{$news->created_at}}</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<img src="{{URL::to('public/uploads/news/'.$news->news_image)}}">

							<p style="padding-top: 15px">{{$news->content}}</p>
							<a  class="btn btn-primary" href="">Read More</a>
						</div>
						@endforeach
						
						<div class="pagination-area">
							<ul class="pagination">
								<li><a href="" class="active">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection