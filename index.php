<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once 'pages/bootstrap.php';

$code = "";
//echo $_SESSION['role'];
//check if already logged in move to home page
if( !$user->is_logged_in() ){
	 header('Location: login.php'); exit(); 
}

require_once ('pages/menu_admin.php');	

//echo $_SESSION['default_level2_name'];
if(isset($_SESSION['username'])){
	$roles = $user->get_roles($_SESSION['username']);
}

Xcrud_config::$theme = 'bootstrap4';//Set theme to bootstrap 4
if(isset($_GET['level1'])){
	$level1= $_GET['level1'];
}else{
	
	//echo $_SESSION['default_level_name'];	
	if(isset($_SESSION['default_level1_name'])){
		$level1 = $_SESSION['default_level1_name'];
	}else{
		$level1 = false;
	}
}

if(isset($_GET['level2'])){
	$level2 = $_GET['level2'];
}else{
	if(isset($_SESSION['default_level2_name'])){
	    $level2 = $_SESSION['default_level2_name'];
		
	}else{
		$level2 = false;
	}
}

if($level1 != false && $level2 != false){
	if (array_key_exists($level2, $pagedata[$level1])) {	
		extract($pagedata[$level1][$level2]);
	}else{
			$level1 = false;
			$level2 = false;
			$code = "Page Not found";	
	}
}

if($level1 == false || $level2 == false){
	
}else{
		
	$file = dirname(__file__) . '/pages/' . $filename;
	try{
	
		if(file_exists($file)){
			$code = file_get_contents($file);
		}else{
			$code = "File Not Found";
		}
		
	}catch(Exception $e){
		$code = "File Not Found";
		exit;
	}
}

$xcrud = Xcrud::get_instance();	
if(isset($_SESSION["lang"])){
	$xcrud->language($_SESSION["lang"]);
}else{
	$xcrud->language('en');
} 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Codefox - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="Admin/Vertical/dist/assets/images/favicon.ico">

        <!-- Bootstrap select pluings -->
        <link href="Admin/Vertical/dist/assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

        <!-- c3 plugin css -->
        <link rel="stylesheet" type="text/css" href="Admin/Vertical/dist/assets/libs/c3/c3.min.css">

        <!-- App css -->
        <link href="Admin/Vertical/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="Admin/Vertical/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="Admin/Vertical/dist/assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
        
        <link href="lib/xcrud/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
		<link href="lib/xcrud/plugins/tabulator-master/dist/css/bootstrap/tabulator_bootstrap4.css" rel="stylesheet">
		<link href="lib/xcrud/plugins/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css">
	    
	    <script src="lib/xcrud/plugins/jquery-3.5.1.min.js"></script>
	    
	    <script src="lib/xcrud/plugins/jquery-migrate-3.0.0.min.js"></script>
	    <script src="js/jquery/jquery-ui.js"></script>
	    <script src="lib/xcrud/plugins/tabulator-master/dist/js/tabulator.js"></script> 

    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
        
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-settings-outline"></i>
                                    </div>
                                    <p class="notify-details">New settings
                                        <small class="text-muted">There are new settings available</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon">
                                        <img src="Admin/Vertical/dist/assets/images/users/avatar-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Cristina Pride</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>

                    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning">
                                        <i class="mdi mdi-bell-outline"></i>
                                    </div>
                                    <p class="notify-details">Updates
                                        <small class="text-muted">There are 2 new updates available</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="Admin/Vertical/dist/assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Karen Robinson</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Wow ! this admin looks good and awesome design</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                    <p class="notify-details">New user
                                        <small class="text-muted">You have 10 unread messages</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">4 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-secondary">
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <b>Admin</b>
                                        <small class="text-muted">13 days ago</small>
                                    </p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="Admin/Vertical/dist/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0"><?php echo $xcrud->translate_external_text("welcome") . " " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "<br>Username: " . $_SESSION['username']; ?>!</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="logout.php" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="Admin/Vertical/dist/assets/images/logo-light.png" alt="" height="20">
                            <!-- <span class="logo-lg-text-light">Codefox</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-light">C</span> -->
                            <img src="Admin/Vertical/dist/assets/images/logo-sm.png" alt="" height="24">
                        </span>
                    </a>
                    <a href="index.html" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="Admin/Vertical/dist/assets/images/logo-dark.png" alt="" height="20">
                            <!-- <span class="logo-lg-text-dark">Codefox</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">C</span> -->
                            <img src="Admin/Vertical/dist/assets/images/logo-sm.png" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
        
                    <li class="dropdown d-none d-lg-block ">
                        <div class="lang-option">
                            <select class="select-language selectpicker form-control" title="" data-width="110px">
                               
                                 <?php
									//print_r($roles);
									$languages = array(
									                  array('en','English'),
									                  array('fr','French'),
													  array('de','Germany'),
													  array('es','Spanish'));
									foreach ( $languages as $val ) {
										
										if($_SESSION['lang'] == $val[0]){
											echo "<option selected value=" . $val[0]  . ">" . $val[1] . "</option>";	
										}else{
											echo "<option value=" . $val[0]  . ">" . $val[1] . "</option>";	
										}								
									}
									?>
		                    </select>
                        </div>
            
                    </li>
                    
                    <li class="dropdown d-none d-lg-block ">
                        <div class="lang-option">
                            <select name="selectRoleVal" class="select-role selectpicker form-control" title="" data-width="200px">
                               <?php
							//print_r($roles);
							foreach ( $roles as $val ) {
								
								if($_SESSION['role'] == $val['sys_roles_id']){
									echo "<option selected value=" . $val['sys_roles_id']  . ">" . $val['roles_name'] . "</option>";	
								}else{
									echo "<option value=" . $val['sys_roles_id']  . ">" . $val['roles_name'] . "</option>";	
								}								
							}
							?>
                            </select>
                        </div>
            
                    </li>

                </ul>
            </div>
            <!-- end Topbar -->

            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu mm-show" id="side-menu">

                            
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid content-wrapper">
                    	
                    	<div class="row">
					        <div class="col-12">
					            <div class="page-title-box">
					                <div class="page-title-right">
					                    <ol class="breadcrumb m-0">
					                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo $level1; ?></a></li>
					                        <li class="breadcrumb-item active"><?php echo $level2; ?></li>
					                    </ol>
					                </div>
					                <h4 class="page-title"> <?php echo $xcrud->translate_external_text("welcome") . " " .  $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "/Username: " . $_SESSION['username']; ?></h4>
					            </div>
					        </div>
					    </div>
                        
                        <?php 
			
						if($level1 == false || $level2 == false){
							
							if($code == ""){
								echo "Role has no rights";
							}else{
								echo $code;
							}
							     
								//exit;
						}else{
							try{	
								if(file_exists($file)){
									include($file);
								}else{
									$code = "File Not Found";
									echo $code;
								}
								
							}catch(Exception $e){
								$code = "File Not Found";
								echo $code;
								
							}
						}
				
				   ?>
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2016 - 2020 &copy; Codefox theme by <a href="">Coderthemes</a>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="#">About Us</a>
                                    <a href="#">Help</a>
                                    <a href="#">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

                <!-- Right Sidebar -->
                <div class="right-bar">
                    <div class="rightbar-title">
                        <a href="javascript:void(0);" class="right-bar-toggle float-right">
                            <i class="mdi mdi-close"></i>
                        </a>
                        <h5 class="m-0 text-white">Theme Customizer</h5>
                    </div>
                    <div class="slimscroll-menu">
        
                        <div class="p-3">
                            <div class="alert alert-warning" role="alert">
                                <strong>Customize </strong> the overall color scheme, layout, etc.
                            </div>
                            <div class="mb-2">
                                <img src="Admin/Vertical/dist/assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
                            </div>
                            <div class="custom-control custom-switch mb-3">
                                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                            </div>
            
                            <div class="mb-2">
                                <img src="Admin/Vertical/dist/assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
                            </div>
                            <div class="custom-control custom-switch mb-3">
                                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="Admin/Vertical/dist/assets/css/bootstrap-dark.min.css" 
                                    data-appStyle="Admin/Vertical/dist/assets/css/app-dark.min.css" />
                                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                            </div>
            
                            <div class="mb-2">
                                <img src="Admin/Vertical/dist/assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
                            </div>
                            <div class="custom-control custom-switch mb-3">
                                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="Admin/Vertical/dist/assets/css/app-rtl.min.css" />
                                <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                            </div>

                            <div class="mb-2">
                                <img src="Admin/Vertical/dist/assets/images/layouts/dark-rtl.png" class="img-fluid img-thumbnail" alt="">
                            </div>
                            <div class="custom-control custom-switch mb-5">
                                <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="Admin/Vertical/dist/assets/css/bootstrap-dark.min.css" 
                                    data-appStyle="Admin/Vertical/dist/assets/css/app-dark-rtl.min.css" />
                                <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                            </div>

                            <a href="https://wrapbootstrap.com/theme/codefox-admin-dashboard-template-WB0X27670?ref=coderthemes" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
                        </div>
                    </div> <!-- end slimscroll-menu-->
                </div>
                <!-- /Right-bar -->

                <!-- Right bar overlay-->
                <div class="rightbar-overlay"></div>

                <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
                    <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
                </a>

        <!-- Vendor js -->
        <!--<script src="Admin/Vertical/dist/assets/js/vendor.min.js"></script>-->      
        <script src="lib/xcrud/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>

        <!-- Bootstrap select plugin -->
        <script src="Admin/Vertical/dist/assets/libs/bootstrap-select/bootstrap-select.min.js"></script>

        <!-- plugins 
        <script src="Admin/Vertical/dist/assets/libs/c3/c3.min.js"></script>
        <script src="Admin/Vertical/dist/assets/libs/d3/d3.min.js"></script>
        <script src="Admin/Vertical/dist/assets/js/pages/dashboard.init.js"></script>-->

        <!-- App js -->
        <script src="Admin/Vertical/dist/assets/js/app.min.js"></script>
        <!--<script src="Admin/Vertical/dist/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>-->
        
	    <script src="js/main.js"></script><!--not a theme folder -->
        
    </body>
</html>