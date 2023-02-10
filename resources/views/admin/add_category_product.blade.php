@extends('layout_admin')
@section('content_admin')


<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" name="categoty_product_name" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea rows="6" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục" name="categoty_product_description"></textarea>
                                </div>
                                <div class="form-group">
                                    <select class="form-control input-sm m-bot15">
                                        <option>Hiển thị</option>
                                        <option>Ẩn</option>
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
                                <button type="submit" name="add_categoty_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            @endsection
