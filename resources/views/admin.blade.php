<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}">
    <link rel="stylesheet" href="https://rawgit.com/lykmapipo/themify-icons/master/css/themify-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('js/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href=""><img src="{{asset('img/logo.png')}}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-angle-down"></i><span>Kateqoriya</span></a>
                                <ul class="collapse">
                                    <li><a href="{{URL::to('admin/allcategories')}}">Kateqoriyalar</a></li>
                                    <li><a href="{{URL::to('admin/addcategory')}}">Kateqoriya Əlavə et</a></li>

                                </ul>
                            </li>

                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-angle-down"></i><span>Məhsul</span></a>
                                <ul class="collapse">
                                    <li><a href="{{URL::to('admin/allproduct')}}">Məhsullar</a></li>
                                    <li><a href="{{URL::to('admin/addproduct')}}">Məhsul Əlavə et</a></li>

                                </ul>
                            </li>

                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-angle-down"></i><span>Kolleksiya</span></a>
                                <ul class="collapse">
                                    <li><a href="{{URL::to('admin/newcollection')}}">Yeni kolleksiya</a></li>
                                </ul>
                            </li>


                            <li class="active">
                              <a href="javascript:void(0)" aria-expanded="true"><i class="ti-angle-down"></i><span>Mesajlar</span></a>
                                <ul class="collapse">
                                  <li><a href="{{URL::to('admin/message')}}">Mesajlar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>

                      <?php
                        $message_count=DB::table('tbl_message')->where('message_show','=',0)->count();
                      ?>

                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>

                                <a href="{{URL::to('admin/message')}}"><i class="fa fa-envelope-o fa-2x"><span>{{$message_count}}</span></i></a>


                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Admin</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="">@yield('stitle')</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">

              <div class="row">

                 @yield('content')


              </div>


            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Developed by Elvin Elesgerov</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->


    <!-- jquery latest version -->
    <script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/metisMenu.min.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{asset('js/line-chart.js')}}"></script>
    <!-- all pie chart -->
    <script src="{{asset('js/pie-chart.js')}}"></script>
    <!-- others plugins -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
    </script>

    <script>

    $('#myModal').on('show.bs.modal',function(e) {

      var cat_id=$(e.relatedTarget).data('id');
      $('#dataid').val(cat_id);

    });

    $('#deletecategory').click(function () {
      $('#myForm').submit();
    });

    $('#myModalMessage').on('show.bs.modal',function(e) {

      var message_id=$(e.relatedTarget).data('id');
      $('#dataidMessage').val(message_id);

    });

    $('#deletemessage').click(function () {
      $('#myFormMessage').submit();
    });




    </script>
</body>

</html>
