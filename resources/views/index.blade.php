<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>@yield('title')</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/main.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> 055-847-99-95</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> electrocommerce@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Bakı şəh.</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li>
							@if(session()->has('user_name'))

							@else
							<a href="{{URL::to('/register')}}"><i class="fa fa-users"></i>Register</a>
							@endif
						</li>
						<li>
              @if(session()->has('user_name'))
	            <a href="/mykabinet/{{session()->get('user_id')}}"><i class="fa fa-user-o"></i><?php echo session()->get('user_name'); ?></a>
							@else
							<a href="{{URL::to('/login')}}"><i class="fa fa-user-o"></i>Login</a>
              @endif
						</li>
						<li>
							@if(session()->has('user_name'))
							<a href="/logout"><i class="fa fa-sign-out"></i>Logout</a>
							@else

							@endif
						</li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>

									<select class="input-select">
										<option>Kateqoriyalar</option>
                    @foreach($categories_index as $category)
										<option value="1">{{$category->category_name}}</option>
                    @endforeach
									</select>

									<input class="input"  style="width:240px;" placeholder="Axtar..">
									<button class="search-btn" style="width:50px;">Axtar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<!-- Cart -->

								@if(session()->get('user_id') !=null)


								<?php

									$myfavorites=DB::table('tbl_favorite')
															 ->join("tbl_product","tbl_product.product_id",'=','tbl_favorite.product_id')
															 ->where('tbl_favorite.user_id','=',session()->get('user_id'))
															 ->select("tbl_product.*")
															 ->get();

							   	$myfavoritesResult=DB::table('tbl_favorite')
															 ->join("tbl_product","tbl_product.product_id",'=','tbl_favorite.product_id')
															 ->where('tbl_favorite.user_id','=',session()->get('user_id'))
															 ->count();

								 ?>

								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>İstəklərim</span>
										<div class="qty">{{$myfavoritesResult}}</div>
									</a>
										@if($myfavoritesResult!=0)
									<div class="cart-dropdown">
										<div class="cart-list">





                       @foreach($myfavorites as $myfavorite)
											 	<div class="product-widget">
												<div class="product-img">
													<img src="{{$myfavorite->product_photo}}"  style="width:60px;height:60px;" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$myfavorite->product_name}}</a></h3>
													<h4 class="product-price">{{$myfavorite->product_price}} AZN</h4>
												</div>
												<a href="{{URL::to('/deletewish/'.$myfavorite->product_id)}}" class="delete"><i class="fa fa-close"></i></a>
											</div>
                      @endforeach

										</div>
										<div class="cart-summary">
											<small>Seçilmiş ceşidlərin sayı : {{$myfavoritesResult}} </small>

										</div>
										<div class="cart-btns">

											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
										@endif
								</div>
								@endif
								<!-- /Cart -->
								<!-- /Wishlist -->


								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		@include('include/navbar')
		<!-- /NAVIGATION -->

  @yield('content')

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Haqqımızda</h3>
								<p>Müxtəlif kateqoriyalardan təqdim olunan məhsulları axtararkən alıcılar mağaza qiymətləri ilə tanış olaraq heç bir əlavə ödəniş olmadan sifarişlərini bir başa mağazaya yönəltmək imkanı əldə edirlər</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-phone"></i> 055-847-99-95</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i> electrocommerce@gmail.com</a></li>
									<li><a href="#"><i class="fa fa-map-marker"></i> Bakı şəh.</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<?php
                    $menus=DB::table('tbl_menu')->get();
								 ?>
								<h3 class="footer-title">Kateqoriyalar</h3>
								<ul class="footer-links">
									<li><a href="{{URL::to('/computer-all-products')}}">Kompyuterlər</a></li>
					        <li><a href="{{URL::to('/phones-all-products')}}">Mobil telefonlar</a></li>
					        <li><a href="{{URL::to('/cameras-all-products')}}">Kameralar</a></li>
					        <li><a href="{{URL::to('/accessories-all-products')}}">Aksessuarlar</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Məlumat</h3>
								<ul class="footer-links">
									<li><a href="#">Haqqımızda</a></li>
									<li><a href="#">Bizimlə əlaqə</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">Mənim Hesabım</a></li>
									<li><a href="#">Kartım</a></li>
									<li><a href="#">İstəklərim</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
						
							<span class="copyright">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Designed by Elvin Elesgerov
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/slick.min.js')}}"></script>
		<script src="{{asset('js/nouislider.min.js')}}"></script>
		<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('js/main.js')}}"></script>

		<script>
		//products
		 $('#myModalProductView').on('show.bs.modal',function(e) {

			 var button=$(e.relatedTarget);

			 var productname=button.data('productname');
			 var productcategory=button.data('productcategory');
			 var productprice=button.data('productprice');
			 var productoldprice=button.data('productoldprice');
			 var productphoto=button.data('productphoto');
          console.log("basladi");
					 console.log(productphoto);
					  console.log("son");
			$('#productname').text(productname);
			$('#productcategory').text(productcategory);
			$('#productprice').text(productprice + "" + "AZN");
			$('#productoldprice').text(productoldprice + "" + "AZN");
			$('#productphoto').attr('src',productphoto);

		 });


		</script>



	</body>
</html>
