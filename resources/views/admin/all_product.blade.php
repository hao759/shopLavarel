@extends('layout_admin')
@section('content_admin')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê sản phẩm
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Loại</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Nhãn hàng</th>
                        <th>ngày thêm</th>
                        <th>Hiển thị</th>
                        <!-- <th style="width:30px;"></th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_product as $key=>$item)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td><span class="text-ellipsis">{{$item-> product_name}}</span></td>
                        <td><img src="public/upload/product/{{$item->product_image}}" height="100" width="150"></td>
                        <td><span class="text-ellipsis">{{$item-> category_name}}</span></td>
                        <td><span class="text-ellipsis">{{$item-> product_desc}}</span></td>
                        <td><span class="text-ellipsis">{{$item-> product_price}}</span></td>
                        <td><span class="text-ellipsis">{{$item-> brand_name}}</span></td>
                        <td></td>
                        <td>
                            <?php
          if ($item-> product_status) {
            ?>
                            <a href="{{URL::to('/unactive-product/'.$item-> product_id)}}"><span
                                    class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                            <?php
        } else {
          ?>
                            <a href="{{URL::to('/active-product/'.$item-> product_id)}}"><span
                                    class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                            <?php
        }
        ?>

                        </td>

                        <td>
                            <a href="{{URL::to('/edit_product/'.$item-> product_id)}}" class="active"
                                ui-toggle-class="">
                                <i class="fa fa-check text-success text-active"></i></a>
                            <a onclick="return confirm('Are you sure?')"
                                href="{{URL::to('/delete_product/'.$item-> product_id)}}" class="active"
                                ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <!-- <li><a href="">4</a></li> -->
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>


@endsection