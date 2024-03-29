@extends('layout')
@section('content')
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Sản phẩm </h2>
    @foreach($all_product as $key =>$item)

    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{URL::to('/chi_tiet_san_pham/'.$item->product_id)}}">
                        <img src="public/upload/product/{{$item->product_image}}" alt="" width="300px" height="300px" />
                    </a>
                    <form>
                        @csrf
                        <input type="hidden" value="{{$item->product_id}}"
                            class="cart_product_id_{{$item->product_id}}">
                        <input type="hidden" value="{{$item->product_name}}"
                            class="cart_product_name_{{$item->product_id}}">
                        <input type="hidden" value="{{$item->product_image}}"
                            class="cart_product_image_{{$item->product_id}}">
                        <input type="hidden" value="{{$item->product_price}}"
                            class="cart_product_price_{{$item->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$item->product_id}}">

                        <h2>${{number_format($item->product_price)}}</h2>
                        <p>{{$item->product_name}}</p>
                        <button type="button" class="btn btn-default add_to_cart"
                            data-id_product="{{$item->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
                    </form>
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
    </a>
    @endforeach
</div>
<!--features_items-->

<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
            <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
            <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
            <li><a href="#kids" data-toggle="tab">Kids</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tshirt">
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{('public/frontend/images/gallery1.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add_to_cart"><i class="fa fa-shopping-cart"></i>Add to
                                cart</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="recommended_items">
						<h2 class="title text-center">recommended items</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/frontend/images/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div> -->
@endsection
@section('a')
<div?>tesst thu thoi</div>
    @endsection