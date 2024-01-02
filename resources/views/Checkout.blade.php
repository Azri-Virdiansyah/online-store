<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Checkout | E-Shopper</title>
        <link href="/BahanStudy/css/bootstrap.min.css" rel="stylesheet">
        <link href="/BahanStudy/css/font-awesome.min.css" rel="stylesheet">
        <link href="/BahanStudy/css/prettyPhoto.css" rel="stylesheet">
        <link href="/BahanStudy/css/price-range.css" rel="stylesheet">
        <link href="/BahanStudy/css/animate.css" rel="stylesheet">
   <link href="/BahanStudy/css/main.css" rel="stylesheet">
   <link href="/BahanStudy/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/BahanStudy/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/BahanStudy//BahanStudy/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/BahanStudy/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/BahanStudy/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
   <header id="header"><!--header-->

           <div class="header-middle"><!--header-middle-->
                   <div class="container">
                           <div class="row">
                                   <div class="col-md-4 clearfix">
                                           <div class="logo pull-left">
                                                   <a href="index.html"><img src="/BahanStudy/images/home/logo.png" alt="" /></a>
                                           </div>

                                   </div>
                                   <div class="col-md-8 clearfix">
                                           <div class="shop-menu clearfix pull-right">
                                                   <ul class="nav navbar-nav">
                                                    <li><a href="/Checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                                    <li><a href="/Keranjang"></i> Cart</a></li>
                                                    <li><a href="/Login"><i class="fa fa-lock"></i> Login</a></li>
                                                   </ul>
                                           </div>
                                   </div>
                           </div>
                   </div>
           </div><!--/header-middle-->

           <div class="header-bottom"><!--header-bottom-->
                   <div class="container">
                           <div class="row">
                                   <div class="col-sm-9">
                                           <div class="navbar-header">
                                                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                           <span class="sr-only">Toggle navigation</span>
                                                           <span class="icon-bar"></span>
                                                           <span class="icon-bar"></span>
                                                           <span class="icon-bar"></span>
                                                   </button>
                                           </div>
                                           <div class="mainmenu pull-left">
                                                   <ul class="nav navbar-nav collapse navbar-collapse">
                                                           <li><a href="index.html" class="active">Home</a></li>
                                                           <li><a href="contact-us.html">Contact</a></li>
                                                           <li><a href="konfirmasi.html">Confirm</a></li>
                                                   </ul>
                                           </div>
                                   </div>
                                   <div class="col-sm-3">
                                           <div class="search_box pull-right">
                                                   <input type="text" placeholder="Search"/>
                                           </div>
                                   </div>
                           </div>
                   </div>
           </div><!--/header-bottom-->
   </header><!--/header-->

   <section id="cart_items">
           <div class="container">
                   <div class="breadcrumbs">
                           <ol class="breadcrumb">
                             <li><a href="#">Home</a></li>
                             <li class="active">Check out</li>
                           </ol>
                   </div><!--/breadcrums-->


                   <div class="review-payment">
                           <h2>Review & Payment</h2>
                   </div>

                   <div class="table-responsive cart_info">
                           <table class="table table-condensed">
                                   <thead>
                                           <tr class="cart_menu">
                                                   <td class="image">Item</td>
                                                   <td class="description"></td>
                                                   <td class="price">Price</td>
                                                   <td class="quantity">Quantity</td>
                                                   <td class="total">Total</td>
                                                   <td></td>
                                           </tr>
                                   </thead>
                                   <tbody>
               <?php $total = 0; ?>
                 @foreach($checkout as $ckt)
                                           <tr>
                                                   <td class="cart_product">
                                                           <a href=""><img src="/data_file/{{$ckt->gambar}}" alt=""></a>
                                                   </td>
                                                   <td class="cart_description">
                                                           <h4><a href="">{{$ckt->nama_produk}}</a></h4>
                                                   </td>
                                                   <td class="cart_price">
                                                           <p>Rp {{$ckt->harga}}</p>
                                                   </td>
                                                   <td class="cart_quantity">
                                                           {{$ckt->jumlah}}
                                                   </td>
                                                   <td class="cart_total">
                                                           <p class="cart_total_price">Rp{{$ckt->harga * $ckt->jumlah}}</p>
                                           </tr>
               <?php $total += ($ckt->jumlah * $ckt->harga) ?>
               @endforeach

                                           <tr>
                                                   <td colspan="4">&nbsp;</td>
                                                   <td colspan="2">
                                                           <table class="table table-condensed total-result">
                                                                   <tr>
                                                                           <td>Total</td>
                                                                           <td><span>Rp{{$total}}</span></td>
                                                                   </tr>
                                                           </table>
                                                   </td>
                                           </tr>
                                   </tbody>
                           </table>
                   </div>
                   <div class="payment-options">

                           </div>
           </div>
   </section> <!--/#cart_items-->

   <footer id="footer"><!--Footer-->

           <div class="footer-bottom">
                   <div class="container">
                           <div class="row">
                                   <p class="pull-left">Copyright (c) 2013 E-SHOPPER Inc. All rights reserved.</p>
                                   <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                           </div>
                   </div>
           </div>

   </footer><!--/Footer-->


        <script src="/BahanStudy/js/jquery.js"></script>
   <script src="/BahanStudy/js/bootstrap.min.js"></script>
        <script src="/BahanStudy/js/jquery.scrollUp.min.js"></script>
        <script src="/BahanStudy/js/jquery.prettyPhoto.js"></script>
        <script src="/BahanStudy/js/main.js"></script>
</body>
</html>
