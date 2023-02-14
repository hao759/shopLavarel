@extends('layout_admin')
@section('content_admin')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa danh mục sản phẩm
            </header>
            <div class="panel-body">
                <?php
                            $mess=Session::get('messadd');
                        if($mess)
                            echo '<span class="text-danger fw-bolder">'.$mess.'</span>';
                            ?>
                @foreach($edit_category_product as $key=>$item)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update_category_product/'.$item->category_id)}}"
                        method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{$item->category_name}}" class="form-control"
                                name="category_product_name" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea rows="6" class="form-control" id="exampleInputPassword1"
                                placeholder="Mô tả danh mục"
                                name="category_product_description">{{$item->category_desc}}</textarea>
                        </div>
                        <!-- <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div> -->
                        <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
    @endsection