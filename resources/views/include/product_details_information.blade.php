@extends('index')

@section('title')
Electro-Details
@endsection

@section('content')
<!-- SECTION -->
<div style="padding-bottom:200px;" class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- Product main img -->
      <div class="col-md-5 col-md-push-2">
        <div id="product-main-img">

          <?php
                $product_favorite=DB::table('tbl_favorite')
                                  ->where('product_id','=',$product_detail->product_id)
                                  ->count();
           ?>


          <div class="product-preview">
            <img style="width:300px;height:300px;" src="{{URL::to($product_detail->product_photo)}}" alt="{{$product_detail->product_name}}">
          </div>
        </div>
      </div>
      <!-- /Product main img -->

      <!-- Product thumb imgs -->
      <div class="col-md-2  col-md-pull-5">
        <div id="product-imgs">



        </div>
      </div>
      <!-- /Product thumb imgs -->

      <!-- Product details -->
      <div class="col-md-5">
        <div class="product-details">
          <h2 class="product-name">{{$product_detail->product_name}}</h2>
          <div>
            @if($product_favorite > 100 )
            <div class="product-rating">
              @for ($i = 0; $i < $product_favorite; $i++)
              <i class="fa fa-star"></i>
              @endfor
            </div>

             @else
            <div class="product-rating">
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
            </div>
             @endif
          </div>
          <div>
            <h3 class="product-price">{{$product_detail->product_price}} AZN<del class="product-old-price">  {{$product_detail->product_old_price}} AZN</del></h3>
          </div>


          <ul class="product-btns">
            <li><a href="{{URL::to('/addwish/'.$product_detail->product_id)}}"><i class="fa fa-heart-o"></i> İstəklərə Əlavə et</a></li>
          </ul>

          <ul class="product-links">
            <li>Kateqoriya: {{$product_detail->category_name}}</li>
          </ul>



        </div>
      </div>
      <!-- /Product details -->


      <!-- /product tab -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
