<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Trenta Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Baxster Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="<?= base_url(); ?>assets/backend/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?= base_url(); ?>assets/backend/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link rel="icon" href="favicon.ico" type="image/x-icon" >
<!-- font-awesome icons -->
<link href="<?= base_url(); ?>assets/backend/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/backend/css/datatable.css">
<!-- //font-awesome icons -->
<!-- chart -->
<script src="<?= base_url(); ?>assets/backend/js/Chart.js"></script>
<!-- //chart -->
 <!-- js-->
<script src="<?= base_url(); ?>assets/backend/js/jquery-1.11.1.min.js"></script>
<script src="<?= base_url(); ?>assets/backend/js/modernizr.custom.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>assets/backend/js/datatable.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="<?= base_url(); ?>assets/backend/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="<?= base_url(); ?>assets/backend/js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="<?= base_url(); ?>assets/backend/js/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/sweetalert.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="<?= base_url(); ?>assets/backend/js/custom.js"></script>
<!-- <script src="<?= base_url(); ?>assets/js/sweet_alert.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/css/sweet_alert.css"></script> -->
<link href="<?= base_url(); ?>assets/backend/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class="sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right dev-page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" id="cbp-spmenu-s1">
					<div class="scrollbar scrollbar1">
						<ul class="nav" id="side-menu">
							<li>
								<a href="<?= base_url(); ?>admin/dashboard" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-cogs nav_icon"></i>Product <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
									<li>
										<p>
											<a href="<?= base_url(); ?>admin/add_new_product">Add</a>
										</p>
									</li>
									<li>
										<a href="<?= base_url(); ?>admin/product_list">All</a>
									</li>
								</ul>
								<!-- /nav-second-level -->
							</li>
							<li>
								<a href="#"><i class="fa fa-cogs nav_icon"></i>Category <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
									<li>
										<a href="<?= base_url(); ?>admin/add_new_category">Add</a>
									</li>
									<li>
										<a href="<?= base_url(); ?>admin/category_list">All</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="#"><i class="fa fa-cogs nav_icon"></i>Ticket Managemant <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
									<li>
										<a href="<?= base_url(); ?>admin/all-tickets">All Ticket</a>
									</li>
									<li>
										<a href="<?= base_url(); ?>admin/all-rejectedTickets">Rejected Ticket</a>
									</li>
								</ul>
							</li>
								
						</ul>
					</div>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--logo -->
				<div class="logo">
					<a href="<?= base_url(); ?>admin/dashboard">
						<img src="<?= base_url(); ?>assets/backend/images/logo.jpg" width=100 height=100 alt="" />
					</a>
				</div>
				<!--//logo-->
				<div class="header-right header-right-grid">
					<div class="profile_details_left"><!--notifications of menu start -->
						<ul class="nofitications-dropdown">
							<li class="dropdown head-dpdn">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
								<ul class="dropdown-menu anti-dropdown-menu">
									<li>
										<div class="notification_header">
											<h3>You have 3 new messages</h3>
										</div>
									</li>
									<li><a href="#">
									   <div class="user_img"><img src="<?= base_url(); ?>assets/backend/images/1.png" alt=""></div>
									   <div class="notification_desc">
										<p>Lorem ipsum dolor amet</p>
										<p><span>1 hour ago</span></p>
										</div>
									   <div class="clearfix"></div>	
									</a></li>
									<li class="odd"><a href="#">
										<div class="user_img"><img src="<?= base_url(); ?>assets/backend/images/2.png" alt=""></div>
									   <div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
										</div>
									  <div class="clearfix"></div>	
									</a></li>
									<li><a href="#">
									   <div class="user_img"><img src="<?= base_url(); ?>assets/backend/images/3.png" alt=""></div>
									   <div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
										</div>
									   <div class="clearfix"></div>	
									</a></li>
									<li>
										<div class="notification_bottom">
											<a href="#">See all messages</a>
										</div> 
									</li>
								</ul>
							</li>
							<li class="dropdown head-dpdn">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
								<ul class="dropdown-menu anti-dropdown-menu">
									<li>
										<div class="notification_header">
											<h3>You have 3 new notification</h3>
										</div>
									</li>
									<li><a href="#">
										<div class="user_img"><img src="<?= base_url(); ?>assets/backend/images/2.png" alt=""></div>
									   <div class="notification_desc">
										<p>Lorem ipsum dolor amet</p>
										<p><span>1 hour ago</span></p>
										</div>
									  <div class="clearfix"></div>	
									 </a></li>
									 <li class="odd"><a href="#">
										<div class="user_img"><img src="<?= base_url(); ?>assets/backend/images/1.png" alt=""></div>
									   <div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
										</div>
									   <div class="clearfix"></div>	
									 </a></li>
									 <li><a href="#">
										<div class="user_img"><img src="<?= base_url(); ?>assets/backend/images/3.png" alt=""></div>
									   <div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
										</div>
									   <div class="clearfix"></div>	
									 </a></li>
									 <li>
										<div class="notification_bottom">
											<a href="#">See all notifications</a>
										</div> 
									</li>
								</ul>
							</li>	
							<li class="dropdown head-dpdn">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">15</span></a>
								<ul class="dropdown-menu anti-dropdown-menu">
									<li>
										<div class="notification_header">
											<h3>You have 8 pending task</h3>
										</div>
									</li>
									<li><a href="#">
										<div class="task-info">
											<span class="task-desc">Database update</span><span class="percentage">40%</span>
											<div class="clearfix"></div>	
										</div>
										<div class="progress progress-striped active">
											<div class="bar yellow" style="width:40%;"></div>
										</div>
									</a></li>
									<li><a href="#">
										<div class="task-info">
											<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
										   <div class="clearfix"></div>	
										</div>
										<div class="progress progress-striped active">
											 <div class="bar green" style="width:90%;"></div>
										</div>
									</a></li>
									<li><a href="#">
										<div class="task-info">
											<span class="task-desc">Mobile App</span><span class="percentage">33%</span>
											<div class="clearfix"></div>	
										</div>
									   <div class="progress progress-striped active">
											 <div class="bar red" style="width: 33%;"></div>
										</div>
									</a></li>
									<li><a href="#">
										<div class="task-info">
											<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
										   <div class="clearfix"></div>	
										</div>
										<div class="progress progress-striped active">
											 <div class="bar  blue" style="width: 80%;"></div>
										</div>
									</a></li>
									<li>
										<div class="notification_bottom">
											<a href="#">See all pending tasks</a>
										</div> 
									</li>
								</ul>
							</li>	
						</ul>
						<div class="clearfix"> </div>
					</div>
				</div>
				
				
				<div class="clearfix"> </div>
			</div>
			<!--search-box-->
				<div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
					</form>
				</div>
				<!--//end-search-box-->
			<div class="header-right">
				
				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img style="width: 71px !important;" src="<?= base_url(); ?>assets/backend/images/avatarone.jpeg" alt=""> </span> 
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
								<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
								<li> <a href="<?= base_url() ?>logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
			