@extends('layout')
@section('content')
<div class="table-responsive cart_info">
    <?php
$content = Cart::content();
?>

    <section id="cart_items" width="70%">
        <div>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Thanh toán giỏ hàng</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <?php
$content = Cart::content();
?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
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
                                        <input class="cart_quantity_input" type="text" name="quantity"
                                            value={{$item->qty}} autocomplete="off" size="2">
                                        <input type="hidden" name="row_ID" value={{$item->rowId}} />
                                        <input type="submit" value="Cap nhat" class="btn btn-default btn-sm" />
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
    <form method="post" action="{{URL::to('/order')}}">
        {{csrf_field}}
        <div class="payment-options">
            <span>
                <label><input value=1 type="checkbox"> Nhận tiền mặt</label>
            </span>
            <span>
                <label><input value=2 type="checkbox"> Check Payment</label>
            </span>
            <span>
                <label><input value=3 type="checkbox"> Paypal</label>
            </span>
            <button type="submit" class="btn btn-primary" value=" Đặt hàng">
        </div>
    </form>
    < @endsection