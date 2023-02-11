@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
		@foreach($category_name as $key=>$item)
						<h2 class="title text-center">Sản phẩm {{$item->category_name}}</h2>
						@endforeach
				@foreach($all_product as $key =>$item)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<!-- <img src="../public/upload/product/{{$item->product_image}}" alt="" width="300px" height="300px" /> -->
												<img  src="{{URL::to('/public/upload/product/'.$item->product_image)}}" width="300px" height="300px"/>
											<h2>${{number_format($item->product_price)}}</h2>
											<p>{{$item->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
											<h2>${{number_format($item->product_price)}}</h2>
												<p>{{$item->product_name}}</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach 
					</div><!--features_items-->

                    <div class="category-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
								<li><a href="#blazers" data-toggle="tab">Blazers</a></li>
								<li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
								<li><a href="#kids" data-toggle="tab">Kids</a></li>
								<!-- <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li> -->
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{('public/frontend/images/gallery1.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
  @endsection
