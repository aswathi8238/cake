<?php
session_start();
include('dbconnection.php');
if(isset($_POST['login']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
	$query =  'select * from admin_login where username = "'.$username. '" and password = "'.$password.'"';
	$result=mysqli_query($con,$query);
$_SESSION['logged_in1']='one';
	if(mysqli_num_rows($result)>0)
	{
	$_SESSION['logged_in']=$username;
      header("location:admin-home.php");
    }
	else
	{
	//echo "<script>alert('Incorrect username or password. Please try again');</script>";
	echo '<script>alert("Invalid username or password");</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Cake &mdash; Admin Login </title>
		<meta name="description" content="Free Bootstrap 4 Theme by ProBootstrap.com">
		<meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">

		<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/fonts/ionicons/css/ionicons.min.css">
    
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="assets/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/select2.css">
    

    <link rel="stylesheet" href="assets/css/helpers.css">
    <link rel="stylesheet" href="assets/css/style.css">
<style>
body {
	
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
	</head>
	<body>
  

   
    <!-- END nav -->
    

   <section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5" id="section-home">
      <div class="overlay"></div>
      <div class="container">
        <div class="row align-items-center text-center">
          <div class="col-md">
           
            <p class="lead mb-5 probootstrap-animate">
  

            </p>
               <div class="signup-form">
    <form  method="POST" action="admin-login.php">
		<h2>Login Here</h2>
		
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="username" required="true">
        </div>
		
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="true">
        </div>
		     
      
		<div class="form-group">
            <input type="submit" name="login" class="btn btn-warning btn-lg btn-block" value="Login">
        </div>
    </form>
	
</div>
            </p>
          </div> 
        </div>
      </div>
    
    </section>
    <!-- END section -->
    

   
    <!-- END section -->


   
  
     

   


    <!-- END section -->

   
	</body>
</html>