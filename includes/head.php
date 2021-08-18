<?php
ob_start();
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login");
}
include "connect.php";
$getData = $conn->prepare("SELECT * FROM admins WHERE username = ?");
$getData->execute([$_SESSION['admin']]);
$admin = [];
if($getData->rowCount() > 0){
    $admin = $getData->fetch(PDO::FETCH_OBJ);
}
if(empty($admin)){
    header("Location: login");
}
?>
<!DOCTYPE html>
<html>

<head>
        <meta charset="UTF-8">
        <title>Admin Dashboard | Learnoflix</title>   
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Learnoflix">

        <!-- Base Css Files -->
        <link href="assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
        <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/libs/fontello/css/fontello.css" rel="stylesheet" />
        <link href="assets/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
        <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" /> 
        <link href="assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" /> 
        <link href="assets/libs/pace/pace.css" rel="stylesheet" />
        <link href="assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
        <link href="assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
        <!-- Code Highlighter for Demo -->
        <link href="assets/libs/prettify/github.css" rel="stylesheet" />
        
                <!-- Extra CSS Libraries Start -->
                <link href="assets/libs/jquery-datatables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
                <link href="assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css" rel="stylesheet" type="text/css" />
                <link href="assets/libs/summernote/summernote.css" rel="stylesheet" type="text/css" />
                <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->
        <link href="assets/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    </head>
    <body class="fixed-left">
        <!-- Modal Start -->
	<!-- Modal Logout -->
	<div class="md-modal md-just-me" id="logout-modal">
		<div class="md-content">
			<h3><strong>Logout</strong> Confirmation</h3>
			<div>
				<p class="text-center">Are you sure want to logout from this awesome system?</p>
				<p class="text-center">
				<button class="btn btn-danger md-close">Nope!</button>
				<a href="logout.php" class="btn btn-success md-close">Yeah, I'm sure</a>
				</p>
			</div>
		</div>
	</div>        <!-- Modal End -->	
	<!-- Begin page -->
	<div id="wrapper">
		
<!-- Top Bar Start -->
<div class="topbar">
    <div class="topbar-left">
        <div class="logo">
            <h4 style="color:wheat">Learnoflix</h4>
        </div>
        <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
        </button>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-collapse2">
                <ul class="nav navbar-nav hidden-xs">
                </ul>
                <ul class="nav navbar-nav navbar-right top-navbar">
                    <li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
                    <li class="dropdown topbar-profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image">
                            <img src="images/admin.png"></span> <?php echo $admin->username; ?>
                            <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php">My Profile</a></li>
                            <li class="divider"></li>
                            <li><a class="md-trigger" data-modal="logout-modal"><i class="icon-logout-1"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->
		    <!-- Left Sidebar Start -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
               <!-- Search form -->
                <form role="search" class="navbar-form">
                    <div class="form-group">
                        <input type="text" placeholder="Search" class="form-control">
                        <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <div class="clearfix"></div>
                <!--- Profile -->
                <div class="profile-info">
                    <div class="col-xs-4">
                      <a href="profile.php" class="rounded-image profile-image"><img src="images/admin.png"></a>
                    </div>
                    <div class="col-xs-8">
                        <br>
                        <div class="profile-text">Welcome <b><?php echo $admin->username; ?></b></div>
                    </div>
                </div>
                <!--- Divider -->
                <div class="clearfix"></div>
                <hr class="divider" />
                <div class="clearfix"></div>
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href='index.php.php'><i class='fa fa-dashboard'></i><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href='profile.php'><i class='fa fa-user'></i><span>Profile</span></a>
                        </li>
                        <li>
                            <a href='admins.php'><i class='fa fa-gavel'></i><span>Admins</span></a>
                        </li>
                        <li>
                            <a href='affiliates.php'><i class='fa fa-link'></i><span>Affiliates</span></a>
                        </li>
                        <li>
                            <a href='coaches.php'><i class='fa fa-graduation-cap'></i><span>Coaches</span></a>
                        </li>
                        <li>
                            <a href='students.php'><i class='fa fa-users'></i><span>Students</span></a>
                        </li>
                        <li>
                            <a href='courses.php'><i class='fa fa-book'></i><span>Courses</span></a>
                        </li>
                        <li>
                            <a href='epins.php'><i class='fa fa-list'></i><span>Epins</span></a>
                        </li>
                        <li>
                            <a href='withdrawals.php'><i class='fa fa-upload'></i><span>Withdrawals</span></a>
                        </li>
                        <li>
                            <a href='logout.php'><i class='fa fa-arrow-right'></i><span>Logout</span></a>
                        </li>
                    </ul>                    
                    <div class="clearfix"></div>
                </div>
            <div class="clearfix"></div>
            <br><br><br>
        </div>
        </div>
        <!-- Left Sidebar End -->	
		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">