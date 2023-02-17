@extends('layout')
@section('content')

<section id="cart_items" width="70%">
    <!-- <div class="">//container -->
    <div>
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
$content = Cart::content();
//  print_r()
?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $key=>$item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img width="210px" height="120px"
                                    src="{{URL::to('public/upload/product/'.$item->options->image)}}"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$item->name}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>${{$item->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/updata_Cart')}}" method="post">
                                    {{csrf_field()}}
                                    <input class="cart_quantity_input" type="text" name="quantity" value={{$item->qty}}
                                        autocomplete="off" size="2">
                                    <input type="hidden" name="row_ID" value={{$item->rowId}} />
                                    <input type="submit" value="Cap nhat" class="btn btn-default btn-sm" />
                                    <!-- <a class="cart_quantity_down" href=""> - </a> -->
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"> ${{Cart::subtotal()}} </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/deleteCart/'.$item->rowId)}}"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>
<!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Giá : <span>${{Cart::subtotal()}}</span></li>
                        <li> Thuế :<span>{{Cart::tax()}}</span></li>
                        <li>Shipping Cost :<span>Miễn phí</span></li>
                        <li> Tổng tiền : <span>${{Cart::total()}}</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="{{URL::to('/login_checkout')}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#do_action-->
@endsection