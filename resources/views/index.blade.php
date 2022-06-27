@extends('master')
@section('content')
<div class="row">
    @foreach($products as $product)
    <div class="col-lg-3 col-sm-4 col-10">
        <div class="product">
            {{-- <img src="{{url('storage/images/'.$product->image)}}" alt="" class="product-image"> --}}
            <a href="/detail-product/{{$product->id}}">
                <img src="https://cdn-assets.dtrack.asia/uploads/product_thumbnail_upload/image/3771/8fbd8151-ebe6-4851-8530-a7be305d133b.jpg" alt="" class="product-image">
            </a>
            <span class="product-name">{{$product->name}}</span>
            <span class="product-company">{{$product->company}}</span>
           
            <div class="rate">
                @for($i=0;$i<5;$i++)
                    <img src="https://cdn-icons-png.flaticon.com/512/2107/2107957.png" alt="" class="product-rate">
                @endfor
            </div>
            <span class="product-sold">{{$product->sold}} đã bán</span> <br>
            <span class="product-price">{{number_format($product->price)}}</span> <br>
            <button class="btn btn-success buy">Thêm vào giỏ</button>
        </div>
    </div>
    @endforeach
</div>
@endsection
