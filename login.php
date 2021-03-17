<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'pages/bootstrap.php';
//check if already logged in move to home page
if ($user -> is_logged_in()) {
	//header('Location: index.php'); exit();
}

//process login form if submitted
if (isset($_POST['submit'])) {
	if (!isset($_POST['username']))
		$error[] = "Please fill out all fields";
	if (!isset($_POST['password']))
		$error[] = "Please fill out all fields";

	$username = $_POST['username'];
	//if ( $user->isValidUsername($username)){
	if (!isset($_POST['password'])) {
		$error[] = 'A password must be entered';
	}
	$password = $_POST['password'];
	if ($user -> login($username, $password)) {

		//header('Location: index.php');
		if (isset($_SESSION['username'])) {
			$roles = $user -> get_roles($_SESSION['username']);
			foreach ($roles as $val) {				
				if ($_SESSION['role'] == $val['sys_roles_id']) {
					$_SESSION['role'] = $val['sys_roles_id'];
				} else {
					$_SESSION['role'] = $val['sys_roles_id'];
				}
			}		
			//logged in return to index page
			header('Location: index.php');		
		} else {

		}
	} else {
		$error[] = 'Wrong username or password or your account has not been activated.';
	}
}//end if submit

//define page title
$title = 'Login';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login | Codefox - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="Admin/Vertical/dist/assets/images/favicon.ico">

        <!-- Bootstrap select pluings -->
        <link href="Admin/Vertical/dist/assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="Admin/Vertical/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="Admin/Vertical/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="Admin/Vertical/dist/assets/css/app.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />

    </head>

    <body class="authentication-bg">
        <div class="home-btn d-none d-sm-block">
            <a href="index.html"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div>

                            <div class="text-center authentication-logo mb-4">
                                <a href="index.html" class="logo-dark">
                                    <span><img src="Admin/Vertical/dist/assets/images/logo-dark.png" alt="" height="30"></span>
                                </a>
                                <a href="index.html" class="logo-light">
                                    <span><img src="Admin/Vertical/dist/assets/images/logo-light.png" alt="" height="30"></span>
                                </a>
                            </div>

                            <form role="form" method="post" action="" autocomplete="off">

                                <?php
									//check for any errors
									if (isset($error)) {
										foreach ($error as $error) {
											echo '<div class="bg-soft-warning text-warning" style="padding:20px;color:black;">' . $error . '</div>';
										}
									}
					
									if (isset($_GET['action'])) {
					
										//check the action
										switch ($_GET['action']) {
											case 'active' :
												echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
												break;
											case 'reset' :
												echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
												break;
											case 'resetAccount' :
												echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
												break;
										}
					
									}
								?>
								
								<?php
									if(!isset($_SESSION['username'])){
								?>
								
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="text" id="username" name="username" required="" placeholder="Enter your email" value="admin">
                                </div>

                                <!--<a href="page-recoverpw.html" class="text-muted float-right">Forgot your password?</a>-->

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required="" id="password" name="password"  placeholder="Enter your password" value="abc123">
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <!--<div class="form-group text-center mb-3">
                                    <button class="btn btn-primary btn-lg width-lg btn-rounded" type="submit"> Sign In </button>
                                </div>-->
                                
                                <?php
								}
								?>
								
								<?php
									if(isset($_SESSION['username'])){
								?>
								<div class="col-sm-12 text-center mb-3">
									   <select class="form-control input-lg" id="selectRoleVal" name="selectRoleVal" style="margin-top: 9px;width: 100%;">
											<?php
											$roles = $user -> get_roles($_SESSION['username']);
											foreach ($roles as $val) {
				
												if ($_SESSION['role'] == $val['sys_roles_id']) {
													echo "<option selected value=" . $val['sys_roles_id'] . ">" . $val['roles_name'] . "</option>";
												} else {
													echo "<option value=" . $val['sys_roles_id'] . ">" . $val['roles_name'] . "</option>";
												}
				
											}
											?>
										</select>
									</div>	
								<?php
								}
								?>
								
								
								<?php
								if(isset($_SESSION['username'])){
								?>
                                 <div class="col-sm-12 text-center mb-3">
									<input type="button"  onclick="backToLogin()" value="Back to Login"
									class="btn btn-primary btn-lg width-lg btn-rounded backtologin" tabindex="5">

									<input type="button"  onclick="selectRole()" value="Proceed"
									class="btn btn-primary btn-lg width-lg btn-rounded selectrole" tabindex="5">
								</div>

								<?php
								}else{
								?>

                                <div class="form-group text-center mb-3">
								<input type="submit" name="submit" value="Sign in"
								class="signin btn btn-primary btn-lg width-lg btn-rounded" tabindex="5">
								</div>
								<?php
								}
								?>

                            </form> 

                        </div>
                        <!-- end card -->

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-dark ml-1">Sign Up</a></p>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="Admin/Vertical/dist/assets/js/vendor.min.js"></script>

        <!-- Bootstrap select plugin -->
        <script src="Admin/Vertical/dist/assets/libs/bootstrap-select/bootstrap-select.min.js"></script>

        <!-- App js -->
        <script src="Admin/Vertical/dist/assets/js/app.min.js"></script>
        
        <script src="js/login.js"></script>
        
    </body>
</html>