@extends('layout_admin')
@section('content_admin')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM SẢN PHẨM
            </header>
            <div class="panel-body">
                <?php
                            $mess=Session::get('messadd');
                        if($mess)
                            echo '<span class="text-danger fw-bolder">'.$mess.'</span>';
                            ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save_product')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="product_name" id="exampleInputEmail1"
                                placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                            <input type="file" class="form-control" name="product_image" id="exampleInputEmail1"
                                placeholder="anhr">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea rows="6" class="form-control" id="exampleInputPassword1"
                                placeholder="Mô tả sản phẩm" name="product_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giá sản phẩm</label>
                            <textarea rows="6" class="form-control" id="exampleInputPassword1"
                                placeholder="Mô tả sản phẩm" name="product_price"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Content sản phẩm</label>
                            <textarea rows="6" class="form-control" id="exampleInputPassword1"
                                placeholder="Mô tả sản phẩm" name="product_content"></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control input-sm m-bot15" name="product_category">
                                @foreach($category_list as $key=>$item)
                                <option value={{$item->category_id}}>{{$item->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control input-sm m-bot15" name="product_brand">
                                @foreach($brand_list as $key=>$item)
                                <option value={{$item->brand_id}}>{{$item->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control input-sm m-bot15" name="product_status">
                                <option value=0>Ẩn</option>
                                <option value=1>Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    @endsection