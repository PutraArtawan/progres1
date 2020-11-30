<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?= $title; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="manifest" href="site.webmanifest"> -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/ui/img/.png') ?>">
	<!-- Place favicon.ico in the root directory -->

	<!-- CSS here -->
	<link href="<?php echo base_url('assets/ui/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/ui/css/owl.carousel.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/ui/css/magnific-popup.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/ui/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/ui/css/themify-icons.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/ui/css/nice-select.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/ui/css/flaticon.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/ui/css/gijgo.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/ui/css/animate.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/ui/css/slick.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/ui/css/slicknav.css') ?>" rel="stylesheet">
	<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

	<link rel="stylesheet" href="<?php echo base_url('assets/ui/css/style.css') ?>">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
	<header>
		<div class="header-area ">
			<div id="sticky-header" class="main-header-area">
				<div class="container-fluid">
					<div class="header_bottom_border">
						<div class="row align-items-center">
							<div class="col-xl-2 col-lg-2">
								<div class="logo">
									<a href="index.html">
										<img src="img/logo.png" alt="">
									</a>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6">
								<div class="main-menu  d-none d-lg-block">
									<nav>
										<ul id="navigation">
											<li><a class="active" href="<?= site_url('user'); ?>">home</a></li>
											<li><a href="<?= site_url('user/about'); ?>">About</a></li>
											<li><a class="" href="<?= site_url('user/destination'); ?>">Destination</a></li>
											<li><a href="#">blog <i class="ti-angle-down"></i></a>
												<ul class="submenu">
													<li><a href="<?= site_url('user/blog'); ?>">blog</a></li>
													<li><a href="<?= site_url('user/news'); ?>">news</a></li>
												</ul>
											</li>
											<li><a href="<?= site_url('user/contact'); ?>">Contact</a></li>
										</ul>
									</nav>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 d-none d-lg-block">
								<div class="social_wrap d-flex align-items-center justify-content-end">
									<div class="number">
										<p>
											<a class="nav-link" href="<?= base_url('auth/logout') ?>">
												<i class="fas fa-fw fa-sign-out-alt"></i>
												<span>Logout</span></a>
										</p>
									</div>
									<div class="social_links d-none d-xl-block">
										<ul>
											<li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
											<li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
											<li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
											<li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="seach_icon">
								<a data-toggle="modal" data-target="#exampleModalCenter" href="#">
									<i class="fa fa-search"></i>
								</a>
							</div>
							<div class="col-12">
								<div class="mobile_menu d-block d-lg-none"></div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</header>
	<!-- header-end -->
