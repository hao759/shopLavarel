@extends('layout_admin')
@section('content_admin')


<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa thương hiệu sản phẩm
                        </header>
                        <div class="panel-body">

                            <?php
                            $mess=Session::get('messadd');
                        if($mess)
                            echo '<span class="text-danger fw-bolder">'.$mess.'</span>';
                            ?>
                            @foreach($edit_brand_product as $key=>$item)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update_brand_product/'.$item->brand_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" value="{{$item->brand_name}}" class="form-control" name="brand_product_name" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea rows="6" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu" name="brand_product_description">{{$item->brand_desc}}</textarea>
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div> -->
                                <button type="submit"  class="btn btn-info">Cập nhật thương hiệu</button>
                                </form>
                            </div>
                        @endforeach
                        </div>
                    </section>

            </div>
            @endsection
