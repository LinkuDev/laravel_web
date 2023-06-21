@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
<div class="col-sm-5">
<div class="view-product">
<img
src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
<h3>ZOOM</h3>
</div>
<div id="similar-product"
class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
<div class="carousel-inner">
<!-- <div class="item active">
<a href=""><img
src="{{URL::to('public/frontend/images/similar1.jpg')}}" alt=""></a>
<a href=""><img
src="{{URL::to('public/frontend/images/similar2.jpg')}}" alt=""></a>
<a href=""><img
src="{{URL::to('public/frontend/images/similar3.jpg')}}" alt=""></a>
</div> -->
</div>
<!-- Controls -->
<a class="left item-control"
href="#similar-product" data-slide="prev">
<i class="fa fa-angleleft"></i>
</a>
<a class="right item-control"
href="#similar-product" data-slide="next">
<i class="fa fa-angleright"></i>
</a>
</div>
</div>
<div class="col-sm-7">
<div class="product-information"><!-
-/product-information-->
<img src="images/productdetails/new.jpg" class="newarrival" alt="" />
<h2>{{$value->product_name}}</h2>
<p>Mã ID: {{$value->product_id}}</p>
<img src="images/productdetails/rating.png" alt="" />
<form action="{{URL::to('/save-cart')}}" method="POST">
{{ csrf_field() }}
<span>
<span>{{number_format($value->product_price).'VNĐ'}}</span>
<label>Số
lượng:</label>
<input name="qty"
type="number" min="1" value="1" />
<input
name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
<button type="submit"
class="btn btn-fefault cart">
<i class="fa fashopping-cart"></i>
Thêm giỏ hàng
</button>
</span>
</form>
<p><b>Tình trạng:</b> Còn
hàng</p>
<p><b>Loại:</b> Mới
100%</p>
<p><b>Thương hiệu:</b>
{{$value->brand_name}}</p>
<p><b>Danh mục:</b>
{{$value->category_name}}</p>
<a href=""><img
src="images/product-details/share.png" class="share img-responsive" alt=""
/></a>
</div><!--/product-information-->
</div>
</div><!--/product-details-->
<div class="category-tab shop-details-tab"><!--
category-tab-->
<div class="col-sm-12">
<ul class="nav nav-tabs">
<li><a href="#details" data-toggle="tab">Mô tả</a></li>
<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
</ul>
</div>
<div class="tab-content">
<div class="tab-pane fade active in" id="details" >
<p>{!!$value->product_desc!!}</p>
</div>
<div class="tab-pane fade" id="companyprofile">
<p>{!!$value->product_content!!}</p>
</div>
<div class="tab-pane fade active in" id="reviews" >
	<div class="col-sm-12">
		<ul>
			<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
			<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
			<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
		</ul>
		
		<p><b>Bình luận với: </b> {{ Session::get('customer_name') }} </p>
		
		{{ Session::get('customer_email') }}

		<?php 
		$check =  Session::get('customer_id');
		if($check == NULL){
		 ?>					
	
			<form action="#">
				<input type="hidden" name="product_id" >
				<input type="hidden" name="customer_id">
				<input type="hidden" name="user">
				<textarea name="content" placeholder="Đăng nhập để bình luận" ></textarea>
				<b>Rating: </b> <img style="size: 110%" src="{{asset('public/frontend/images/rating.png')}}" alt="" />
				<button onclick="myFunction()" class="btn btn-default pull-right">Bình luận</button>
			</form>
			<div class="stars" style="margin-left: 40px">
			  <form action="">
			    <input class="star star-5" id="star-5" type="radio" name="star"/>
			    <label class="star star-5" for="star-5"></label>
			    <input class="star star-4" id="star-4" type="radio" name="star"/>
			    <label class="star star-4" for="star-4"></label>
			    <input class="star star-3" id="star-3" type="radio" name="star"/>
			    <label class="star star-3" for="star-3"></label>
			    <input class="star star-2" id="star-2" type="radio" name="star"/>
			    <label class="star star-2" for="star-2"></label>
			    <input class="star star-1" id="star-1" type="radio" name="star"/>
			    <label class="star star-1" for="star-1"></label>
			  </form>
			</div>
			<script>
			function myFunction() {
			  alert("Đăng nhập để bình luận!!!");
			}
			</script>
			<?php
            }else{
            ?>
            <form action="{{URL::to('/comment')}}" method="POST">{{csrf_field()}}
				<input type="hidden" name="product_id" value="{{$value->product_id}}"  >
				<input type="hidden" name="customer_id" value="{{ Session::get('customer_id') }}">
				<input type="hidden" name="user" value="{{ Session::get('customer_name') }}">
				<textarea name="content" placeholder="Đăng nhập để bình luận" ></textarea>
				<b>Rating: </b> <img src="{{asset('public/frontend/images/rating.png')}}" alt="" />
				<button type="submit" class="btn btn-default pull-right">Bình luận</button>
			</form>
            <?php 
            }
            ?>
		
		<h2>Bình luận khác:</h2>
		<?php 

		$test = count($reviews);
		if($test==0){

		 ?>
		 <h3>Chưa có bình luận nào</h3>

		 <?php
            }else{
            ?>

		@foreach($reviews as $key => $reviews)
			
			<ul class="media-list">
				<li class="media">
					<a class="pull-left" href="#">
						<img class="media-object" src="images/blog/man-two.jpg" alt="">
					</a>
					<div class="media-body">
						<ul class="sinlge-post-meta">
							<li><i class="fa fa-user"></i>{{$reviews->user}}</li>
							
							<li><i class="fa fa-calendar"></i>{{$reviews->date}}	 </li>
						</ul>
							<p>
								{{$reviews->content}}	
							</p>
							<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>trả lời</a>
					</div>
				</li>
								
								
			</ul>		
			<hr>
		@endforeach			
		       <?php 
            }
            ?>
	</div>

</div>
</div>
</div><!--/category-tab-->
@endforeach
<div class="recommended_items"><!--
recommended_items-->
<h2 class="title text-center">Sản phẩm liên
quan</h2>
<div id="recommended-item-carousel"
class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
<div class="item active">
@foreach($relate as $key =>
$lienquan)
<div class="col-sm-4">
<div
class="product-image-wrapper">
<div
class="single-products">
<div class="productinfo text-center">
<img
src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
<h2>{{number_format($lienquan->product_price).' '.'VNĐ'}}</h2>
<p>{{$lienquan->product_name}}</p>
<a href="#" class="btn btn-default add-tocart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>
<a class="left recommended-itemcontrol" href="#recommended-item-carousel" data-slide="prev">
<i class="fa fa-angle-left"></i>
</a>
<a class="right recommended-itemcontrol" href="#recommended-item-carousel" data-slide="next">
<i class="fa fa-angleright"></i>
</a>
</div>
</div><!--/recommended_items-->
@endsection