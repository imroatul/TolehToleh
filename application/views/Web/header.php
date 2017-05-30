<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link id="callCss" rel="stylesheet" href="<?php echo base_url();?>includes/web/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?php echo base_url();?>includes/web/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->
	<link href="<?php echo base_url();?>includes/web/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?php echo base_url();?>includes/web/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->
	<link href="<?php echo base_url();?>includes/web/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>includes/webthemes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>includes/web/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>includes/web/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>includes/web/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>includes/web/themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Web ini masih menggunakan <strong>Versi 1</strong></div>
	<div class="span6">
	<div class="pull-right">Untuk pemesanan hubungi whatsapp 081234567890</div>
	</div>
</div>

<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.html"><img src="<?php echo base_url();?>includes/web/themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="post" action="products.html" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>Semua Kategori</option>
			<option>Makanan</option>
			<option>Minuman</option>
			<option>Pakaian</option>
			<option>Lain-lain</option>
		</select>
		  <button type="submit" id="submitButton" class="btn btn-primary">Cari</button>
    </form>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->

<!--Carousel head==================================================================== -->
<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">

		  <div class="item active">
		  <div class="container">
        <img style="width:100%" src="<?php echo base_url();?>includes/web/themes/images/carousel/1.png" alt="special offers"/>
		  </div>
		  </div>

		  <div class="item">
		  <div class="container">
        <img style="width:100%" src="<?php echo base_url();?>includes/web/themes/images/carousel/2.png" alt=""/>
		  </div>
		  </div>

		  <div class="item">
        <div class="container">
          <img src="<?php echo base_url();?>includes/web/themes/images/carousel/3.png" alt=""/>
        </div>
      </div>

		  <div class="item">
        <div class="container">
          <img src="<?php echo base_url();?>includes/web/themes/images/carousel/4.png" alt=""/>
        </div>
      </div>

		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div>
</div>
<!--Carousel end===================================================================== -->
