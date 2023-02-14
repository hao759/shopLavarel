@extends('layout_admin')
@section('content_admin')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm thương hiệu sản phẩm
            </header>
            <div class="panel-body">
                <?php
                            $mess=Session::get('messadd');
                        if($mess)
                            echo '<span class="text-danger fw-bolder">'.$mess.'</span>'; 
                            ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save_brand_product')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" class="form-control" name="brand_product_name" id="exampleInputEmail1"
                                placeholder="Tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea rows="6" class="form-control" id="exampleInputPassword1"
                                placeholder="Mô tả thương hiệu" name="brand_product_description"></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control input-sm m-bot15" name="brand_product_status">
                                <option value=0>Ẩn</option>
                                <option value=1>Hiển thị</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div> -->
                        <!-- <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div> -->
                        <button type="submit" class="btn btn-info">Thêm thương hiệu</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    @endsection