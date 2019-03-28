@extends('index')

@section('title')
Electro-Home
@endsection

@section('content')
<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- shop -->
      <div class="col-md-4 col-xs-6">
        <div class="shop">
          <div class="shop-img">
            <img src="./img/shop01.png" alt="">
          </div>
          <div class="shop-body">
            <h3>Kompyuterlər<br>Kolleksiya</h3>
            <a href="{{URL::to('/computer-all-products')}}" class="cta-btn">İndİ Al <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /shop -->

      <!-- shop -->
      <div class="col-md-4 col-xs-6">
        <div class="shop">
          <div class="shop-img">
            <img src="./img/shop03.png" alt="">
          </div>
          <div class="shop-body">
            <h3>Mobil Telefonlar<br>Kolleksiya</h3>
            <a href="{{URL::to('/phones-all-products')}}" class="cta-btn">İndİ Al <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /shop -->

      <!-- shop -->
      <div class="col-md-4 col-xs-6">
        <div class="shop">
          <div class="shop-img">
            <img src="./img/shop02.png" alt="">
          </div>
          <div class="shop-body">
            <h3>Kameralar<br>Kolleksiya</h3>
            <a href="{{URL::to('/cameras-all-products')}}" class="cta-btn">İndİ Al <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /shop -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <!-- section title -->
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Yenİ Məhsullar</h3>
          <div class="section-nav">

            </ul>
          </div>
        </div>
      </div>
      <!-- /section title -->

      <!-- Products tab & slick -->
      <div class="col-md-12">
        <div class="row">
          <div class="products-tabs">
            <!-- tab -->
            <div id="tab1" class="tab-pane active">
              <div class="products-slick" data-nav="#slick-nav-1">


                <!-- product -->

               <?php

               $products_new=DB::table('tbl_product')
                            ->where('product_time','=',1)
                            ->join('tbl_category','tbl_product.product_category','=','tbl_category.category_id')
                            ->select('tbl_product.*','tbl_category.category_name')
                            ->get();

               ?>


              @foreach($products_new as $product_new)
                <div class="product">
                  <div class="product-img">
                    <img class="center" src="{{$product_new->product_photo}}" alt="{{$product_new->product_name}}">
                    <div class="product-label">

                        @if($product_new->product_sale==0)

                        @elseif($product_new->product_sale>0)
                          <span class="sale">
                        -{{$product_new->product_sale}}%
                        </span>
                        @elseif($product_new->product_sale>0)
                          <span class="sale">
                        {{$product_new->product_sale}}%
                        </span>
                        @endif

                      <span class="new">YENİ</span>
                    </div>
                  </div>
                  <div class="product-body">
                    <p class="product-category">{{$product_new->category_name}}</p>
                    <h3 class="product-name"><a href="{{URL::to('/product-detail-information/'.$product_new->product_id)}}">{{$product_new->product_name}}</a></h3>
                    <h4 class="product-price">{{$product_new->product_price}} AZN <del class="product-old-price">
                      @if($product_new->product_old_price > 0)
                      {{$product_new->product_old_price}} AZN
                      @endif
                    </del></h4>
                    <div class="product-rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <div  >


                        <?php
                           if (session()->get('user_id') != null) {
                              $favorite=DB::table('tbl_favorite')->where([
                                ['product_id','=',$product_new->product_id],
                                ['user_id','=',session()->get('user_id')]
                                ])->first();



                                if ($favorite !=null) {
                                 ?>
                                 <form   action="{{URL::to('/deletewish/'.$product_new->product_id)}}" method="get">
                                     {{ csrf_field() }}
                                   <button  type="submit"><i class="fa fa-heart"></i></button>
                                 </form>
                                <?php }else {  ?>
                                <form  action="{{URL::to('/addwish/'.$product_new->product_id)}}" method="get">
                                  <button  type="submit"><i class="fa fa-heart-o"></i></button>
                                </form>
                                <?php
                              }

                           }else {
                             ?>
                              <form action="{{URL::to('/addwish/'.$product_new->product_id)}}" method="get">
                              <button  type="submit"><i class="fa fa-heart-o"></i></button>
                              </form>
                              <?php
                           }



                         ?>


                      <button  data-target="#myModalProductView"
                      data-productname="{{$product_new->product_name}}"
                      data-productcategory="{{$product_new->category_name}}"
                      data-productprice="{{$product_new->product_price}}"
                      data-productoldprice="{{$product_new->product_old_price}}"
                      data-productphoto="{{$product_new->product_photo}}"
                      data-toggle="modal"
                      ><i class="fa fa-eye"></i></button>
                    </div>

                  </div>
                  <div class="add-to-cart">
                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                  </div>
                </div>
                @endforeach
                <!-- /product -->

              </div>
              <div id="slick-nav-1" class="products-slick-nav"></div>
            </div>
            <!-- /tab -->
          </div>
        </div>
      </div>
      <!-- Products tab & slick -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

@include('include.newcollection')

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <!-- section title -->
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Məhsullar</h3>
          <div class="section-nav">
            <ul class="section-tab-nav tab-nav">
              <li class="active"><a data-toggle="tab" href="#tab2">Bütün Məhsullar</a></li>
              
            </ul>
          </div>
        </div>
      </div>
      <!-- /section title -->

      <!-- Products tab & slick -->
      <div class="col-md-12">
        <div class="row">
          <div class="products-tabs">
            <!-- tab -->
            <div id="tab2" class="tab-pane fade in active">
              <div class="products-slick" data-nav="#slick-nav-2">
                <!-- product -->
                <?php

                $products=DB::table('tbl_product')
                             ->join('tbl_category','tbl_product.product_category','=','tbl_category.category_id')
                             ->select('tbl_product.*','tbl_category.category_name')
                             ->get();

                ?>
                @foreach($products as $product)
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
                    <h4 class="product-price">{{$product->product_price}} AZN<del class="product-old-price">
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
                      <button  data-target="#myModalProductView"
                      data-productname="{{$product->product_name}}"
                      data-productcategory="{{$product->category_name}}"
                      data-productprice="{{$product->product_price}}"
                      data-productoldprice="{{$product->product_old_price}}"
                      data-productphoto="{{$product->product_photo}}"
                      data-toggle="modal" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                    </div>
                  </div>
                  <div class="add-to-cart">
                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                  </div>
                </div>
                @endforeach
                <!-- /product -->
              </div>
              <div id="slick-nav-2" class="products-slick-nav"></div>
            </div>
            <!-- /tab -->
          </div>
        </div>
      </div>
      <!-- /Products tab & slick -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->



<!-- NEWSLETTER -->
<div id="newsletter" class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <div class="newsletter">
          <p>Yeni məktub göndər</p>
          <form method="post" action="{{URL::to('/checkemail')}}">
             {{ csrf_field() }}
            <input class="input" type="email" placeholder="Enter Your Email">
            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /NEWSLETTER -->

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
