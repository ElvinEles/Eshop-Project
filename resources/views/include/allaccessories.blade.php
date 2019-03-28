@extends('index')

@section('title')
Aksesuarlar
@endsection

@section('content')
<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- ASIDE -->
      <div id="aside" class="col-md-3">



        <!-- aside Widget -->
        <div class="aside">
          <h3 class="aside-title">Qİymət</h3>
          <div class="price-filter">
            <div id="price-slider"></div>
            <div class="input-number price-min">
              <input id="price-min" type="number">
              <span class="qty-up">+</span>
              <span class="qty-down">-</span>
            </div>
            <span>-</span>
            <div class="input-number price-max">
              <input id="price-max" type="number">
              <span class="qty-up">+</span>
              <span class="qty-down">-</span>
            </div>
          </div>
        </div>
        <!-- /aside Widget -->

        <!-- aside Widget -->
        <div class="aside">
          <h3 class="aside-title">Alt Kateqorilər</h3>
          <div class="checkbox-filter">
            <?php
                   $categories=DB::table('tbl_category')
                              ->where('tbl_category.menu_id','=',4)
                              ->select('tbl_category.category_id','tbl_category.category_name')
                              ->get();




             ?>
            @foreach($categories as $category)

           <?php
           $product_count=DB::table('tbl_product')
                      ->join('tbl_category','tbl_category.category_id','=','tbl_product.product_category')
                      ->where([
                        ['tbl_category.menu_id','=',4],
                        ['tbl_category.category_id','=',$category->category_id]

                      ])

                      ->count();

            ?>


            <div class="input-checkbox">
              <input type="checkbox" id="brand-{{$category->category_id}}">
              <label for="brand-{{$category->category_id}}">
                <span></span>
                {{$category->category_name}}
                <small>({{$product_count}})</small>
              </label>
            </div>
             @endforeach
          </div>
        </div>
        <!-- /aside Widget -->

       <?php

       $products_sale=DB::table('tbl_product')
                  ->join('tbl_category','tbl_category.category_id','=','tbl_product.product_category')
                  ->where([
                    ['tbl_category.menu_id','=',4],
                    ['tbl_product.product_sale','<',0]
                  ])
                  ->select('tbl_product.*','tbl_category.category_name')
                  ->get();
        ?>


        <!-- aside Widget -->
        <div class="aside">
          <h3 class="aside-title">Endİrİmlİ Məhsullar</h3>
          @foreach($products_sale as $product_sale)
          <div class="product-widget">
            <div class="product-img">
              <img src="{{$product_sale->product_photo}}" alt="">
            </div>
            <div class="product-body">
              <p class="product-category">{{$product_sale->category_name}}</p>
              <h3 class="product-name"><a href="#">{{$product_sale->product_name}}</a></h3>
              <h4 class="product-price">{{$product_sale->product_price}} AZN <del class="product-old-price">
                {{$product_sale->product_old_price}} AZN</del></h4>
            </div>
          </div>
          @endforeach
        </div>
        <!-- /aside Widget -->
      </div>
      <!-- /ASIDE -->

      <!-- STORE -->
      <div id="store" class="col-md-9">


        <!-- store products -->
        <div class="row">

          <?php
                 $products=DB::table('tbl_product')
                            ->join('tbl_category','tbl_category.category_id','=','tbl_product.product_category')
                            ->where('tbl_category.menu_id','=',4)
                            ->select('tbl_product.*','tbl_category.category_name')
                            ->get();

           ?>
          <!-- product -->

          @foreach($products as $product)
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img class="center" src="{{$product->product_photo}}" alt="{{$product->product_name}}">
                <div class="product-label">
                  @if($product->product_sale==0)

                  @elseif($product->product_sale>0)
                    <span class="sale">
                  -{{$product->product_sale}}%
                  </span>
                  @elseif($product->product_sale>0)
                    <span class="sale">
                  {{$product->product_sale}}%
                  </span>
                  @endif

                  @if($product->product_sale==0)

                  @elseif($product->product_time==1)
                      <span class="new">YENİ</span>
                  @endif
                </div>
              </div>
              <div class="product-body">
                <p class="product-category">{{$product->category_name}}</p>
                <h3 class="product-name"><a href="#">{{$product->product_name}}</a></h3>
                <h4 class="product-price">{{$product->product_price}} AZN <del class="product-old-price">
                  @if($product->product_old_price > 0)
                  {{$product->product_old_price}} AZN
                  @endif
                </del></h4>
                <div class="product-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product-btns">
                  <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                  <button data-target="#myModalProductView"
                  data-productname="{{$product->product_name}}"
                  data-productcategory="{{$product->category_name}}"
                  data-productprice="{{$product->product_price}}"
                  data-productoldprice="{{$product->product_old_price}}"
                  data-productphoto="{{$product->product_photo}}"
                  data-toggle="modal"
                  class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                </div>
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
              </div>
            </div>
          </div>
          @endforeach
          <!-- /product -->

        </div>
        <!-- /store products -->

        <!-- store bottom filter -->
        <div class="store-filter clearfix">
          <span class="store-qty">10 - məhsullar</span>
          <ul class="store-pagination">
            <li class="active">1</li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
          </ul>
        </div>
        <!-- /store bottom filter -->
      </div>
      <!-- /STORE -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->


<div class="modal fade" id="myModalProductView" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">

          <p >Məhsul Haqqında</p>
        </h4>
      </div>

      <div class="modal-footer">
       <!--content-->
      <div class="row">


                <!-- Product thumb imgs -->
                <div class="col-md-4 pull-left">
                  <div>
                    <div>
                      <img id="productphoto" style="width:150px;height:150px;"  src="./img/product06.png" alt="">
                    </div>
                  </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-6 text-right">
                  <div class="product-details">
                    <h3 class="product-name" id="productname"></h3>
                    <div>
                      <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                      </div>
                    </div>
                    <div>
                      <h3 class="product-price"><span id="productprice"></span>  <del class="product-old-price"><span id="productoldprice"></span></del></h3>

                    </div>


                    <ul>
                      <li class=" text-right">Kateqoriya:  <span id="productcategory">Headphones</span></li>
                    </ul>

                  </div>
                </div>
                <!-- /Product details -->

            </div>
       <!---->

      </div>
    </div>

  </div>
</div>



@endsection
