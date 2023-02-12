
@extends('layout')
@section('content')

					<div class="product-details"><!--product-details-->
						@foreach($detail_product as $key=>$item)
						<div class="col-sm-5">
							<div class="view-product">
							<!-- @foreach($detail_product as $key=>$item)
							{{var_dump($item)}}
							<br>
							<br>
							@endforeach -->
								<a href="#">
								<img src="{{URL::to('public/upload/product/'.$item->product_image)}}" alt="" />
										</a>
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="../public/frontend/images/similar1.jpg" alt=""></a>
										  <a href=""><img src="../public/frontend/images/similar2.jpg" alt=""></a>
										  <a href=""><img src="../public/frontend/images/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{asset('public/frontend/images/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="../public/frontend/images/similar2.jpg" alt=""></a>
										  <a href=""><img src="../public/frontend/images/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{asset('public/frontend/images/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('public/frontend/images/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('public/frontend/images/similar3.jpg')}}" alt=""></a>
										</div>
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$item->product_name}}</h2>
								<p>Web ID: 1089772</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>US ${{$item->product_price}}</span>
									<label>Quantity:</label>
									<input type="number" value=1 min=1 />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Thương hiệu:</b> {{$item->brand_name}}</p>
								<p><b>Danh muc:</b> {{$item->category_name}}</p>
								<!-- <p><b>Brand:</b> E-SHOPPER</p> -->
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
						@endforeach
					</div><!--/product-details-->


                    <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Sản phẩm liên quan</a></li>
								<li ><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
							{!!$item->product_content!!}
							<!-- 	<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div> -->
								</div>
							
							<div class="tab-pane fade" id="companyprofile" >
							@foreach($relative_product as $key=> $item)
							<a href="{{URL::to('/chi_tiet_san_pham/'.$item->product_id)}}">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{URL::to('public/upload/product/'.$item->product_image)}}" alt="" />
												<h2>${{$item->product_price}}</h2>
												<p>{{$item->product_name}}</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
												</a>
								@endforeach
							</div>
							<div class="tab-pane fade " id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
                    @endsection