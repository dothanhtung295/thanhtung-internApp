@extends('master')
@section('content')
<?php
    $product_name = '';
    $product_price = '';
    $product_company = '';
    $product_descriptions = '';
    $type = 'Thêm sản phẩm';
    if (isset($product)) {
        $product_name = $product->name;
        $product_price = $product->price;
        $product_company = $product->company;
        $product_descriptions = $product->description;
        $id = $product->id;
        $type = 'Cập nhật';
    }
?>
<form action="/addProduct" method="post" class="form-add-product" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-content">
    <div class="row">
        <div class="col-sm-3">
            @if(isset($errors))
                <div class="alert-danger">
                    @foreach($errors->all() as $er)
                        {{$er}}<br>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tên sản phẩm *" name="product_name" value="{{$product_name}}">
                <input type="text" class="form-control" placeholder="Tên công ty *" name="product_company" value="{{$product_company}}">
                <input type="text" class="form-control" placeholder="Đơn giá *" name="product_price" value="{{$product_price}}">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea class="descriptions" name="product_descriptions" placeholder="Mô tả">{{$product_descriptions}}</textarea>
                <script>
                    CKEDITOR.replace("product_descriptions");
                </script>
                <label class="control-label">Hình ảnh</label>
                @if (isset($product))
                <img src="../images/cafe.jpg" alt="" width="300" height="300">
                @endif
                <input type="file" class="form-control" placeholder="Đơn giá *" name="product_image">
            </div>
            <button type="submit" class="btn btn-success">{{$type}}</button>
            @if (isset($product))
            <a href="/delete-product/{{$id}}"><button type="button" class="btn btn-danger">Xóa sản phẩm</button></a>
            @else
            <a href="/"><button type="button" class="btn btn-danger">Quay lại</button></a>
            @endif
        </div>
            
    </div>
</div>
</form>
@endsection
