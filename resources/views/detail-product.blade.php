@extends('master')
@section('content')
@if (isset($product))
<div class="row">
  <div class="col-sm-4">
    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="../images/cafe.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../images/cafe.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../images/cafe.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev btn" href="#carouselIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next btn" href="#carouselIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      {{-- small picture --}}
      <ol class="carousel-indicators products">
        <img src="../images/cafe.jpg" data-target="#carouselIndicators" data-slide-to="0" class="product-image active">
        <img src="../images/cafe.jpg" data-target="#carouselIndicators" data-slide-to="1" class="product-image">
        <img src="../images/cafe.jpg" data-target="#carouselIndicators" data-slide-to="2" class="product-image">
      </ol>
    </div>
  </div>
  <div class="col-sm-5 d-flex flex-column">
    <div class="p-2 ">
      <h4>{{$product->name}}</h4>
    </div>
    <div class="rate p-1 d-flex justify-content-start">
      <div class="p-2">
        @for($i=0;$i<5;$i++) <img src="https://cdn-icons-png.flaticon.com/512/2107/2107957.png" alt=""
          class="product-rate">
          @endfor
      </div>
      <div class="p-2">
        <span>|</span>
        <a href="#">Xem 0 đánh giá</a>
      </div>
      <div class="p-2">
        <span>| {{$product ->sold}} đã bán</span>
      </div>
    </div>
    <div class="item block-inf">
      <div class="item coupon">
        <span class="title">Mã giảm giá</span>
        <div class="coupon-label ">
          <span class="ticket">FreeShip</span>
          <span class="ticket">Giảm 100k</span>
          <span class="ticket">Giảm 15k</span>
          <span class="ticket">Giảm 10k</span>
          <span class="ticket">Giảm 40k</span>
          <span class="ticket">Giảm 20k</span>
        </div>
      </div>
      <div class="item ship">
        <span class="title ship-label">Vận chuyển đến</span>
        <a class="address" href="#">Quận 1 - TPHCM</a>
      </div>
      <div class="item fee">
        <span class="title">Phí vận chuyển</span>
        <a href="#">25.000đ</a>
      </div>
      <div class="item packet">
        <span class="title">Đóng gói</span>
        <span class="category">12 thanh * 18g</span>
        <span class="category">18 thanh * 18g</span>
      </div>
    </div>
    <div class="item quatity">
      <div class="input-group number-spinner">
        <span class="btn-sub">
          <button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus">-</span></button>
        </span>
        <input type="text" class="form-control text-center" value="1">
        <span class="btn-add">
          <button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus">+</span></button>
        </span>
      </div>
    </div>
    <div class="item form-group button-group">
      <button class="btn add-cart">THÊM VÀO GIỎ HÀNG</button>
      <button class="btn btn-success">MUA NGAY</button>
    </div>
    
  </div>
  <div class="col-sm-3">
    <div class="infor-us">
      <h4>Thông tin thêm</h4>
      <hr>
      <span>Mua sỉ vui lòng liên hệ chúng tôi</span>
      <div class="button-group" style="margin-top: 20px">
        <button class="btn btn-success">Gọi ngay</button>
        <button class="btn btn-info ">Gửi tin nhắn</button>
      </div>
      <hr>
    </div>
  </div>
  <div class="col-sm-12 container-infor">
    <div class="d-flex justify-content-start" style="border-bottom: 1px solid #eee;">
      <span class="tab-item p-2 infor active">THÔNG TIN SẢN PHẨM</span>
      <span class="tab-item p-2 add-infor">THÔNG TIN BỔ SUNG</span>
    </div>
    <div class="d-flex justify-content-between product-infor">
      <div class="content col-sm-5">
        <?php echo htmlspecialchars_decode($product->description);?>
      </div>
      <div class="company-infor col-sm-3">
        <div class="col-sm-12">
          <span>Thương hiệu</span>
        </div>
        <div class="col-sm-12">
          <img src="https://www.nestle.com.vn/sites/g/files/pydnoa216/files/nescafe-logo-round_3.png" alt=""
            class="col-sm-5">
          <span class="col-sm-6">{{$product->company}}</span>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).on('click', '.number-spinner button', function () {    
        var btn = $(this),
          oldValue = btn.closest('.number-spinner').find('input').val().trim(),
          newVal = 0;
        
        if (btn.attr('data-dir') == 'up') {
          newVal = parseInt(oldValue) + 1;
        } else {
          if (oldValue > 1) {
            newVal = parseInt(oldValue) - 1;
          } else {
            newVal = 1;
          }
        }
        btn.closest('.number-spinner').find('input').val(newVal);
      });
    $(document).on('click','.tab-item', function(){
      $(this).parent().find('.active').removeClass('active');
      $(this).addClass('active');
    })
  </script>
  @endif

  @endsection