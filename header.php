<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once('dbconnection.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
if(isset($_GET['removeid']))
{
	$cake_id = $_GET['removeid'];
	unset($_SESSION['carts'][$cake_id]);
}
if(isset($_POST['addtocart']))
{

    $cakeName = $_POST['cakeName'];
	$totalWeight = $_POST['totalWeight'];
	$totalPrice = $_POST['totalPrice'];
	$cakePrice = $_POST['cakePrice'];
	$cakeId = $_POST['cakeId'];
	$caker_id = $_POST['cakerId'];
	$nos = $_POST['nos'];
	$deliveryTime = $_POST['deliveryTime'];
	$deliveryDate = $_POST['deliveryDate'];
	$photo = $_POST['photo'];
	$actualPrice = $_POST['actualPrice'];
	$discountRate  = $_POST['discountRate'];
	if (!isset($_SESSION['carts'])) 
	{
		$_SESSION['carts'] = array ();
	}
	if(isset($_SESSION['carts']) && is_array($_SESSION['carts'])) {
            if (array_key_exists($cakeId, $_SESSION['carts'])) {
                
				                
				$_SESSION['carts'][$cakeId]['quantity']+=$nos;
				$_SESSION['carts'][$cakeId]['totalWeight']+=$totalWeight;
				
            } 
			else 
			{
                // Product is not in carts so add it
                $_SESSION['carts'][$cakeId] = array('cakeId'=>$cakeId,'cakerId'=>$caker_id,'cakeName' => $cakeName, 'totalWeight' => $totalWeight,'quantity'=>$nos,'deliveryDate'=>$deliveryDate,'deliveryTime'=>$deliveryTime,'cakePrice'=>$cakePrice,'totalPrice'=>$totalPrice,'photo'=>$photo,'actualPrice'=>$actualPrice,'discountRate'=>$discountRate);
            }
        }// else {
            // // There are no products in carts, this will add the first product to carts
            // $_SESSION['carts'][$cakeId] = array('cakeId'=>$cakeId,'cakerId'=>$caker_id,'cakeName' => $cakeName, 'totalWeight' => $totalWeight,'quantity'=>$nos,'deliveryDate'=>$deliveryDate,'deliveryTime'=>$deliveryTime,'cakePrice'=>$cakePrice,'totalPrice'=>$totalPrice,'photo'=>$photo);
        // }
		$cart = count($_SESSION ['carts']);
}
$cart = 0;

 if (isset( $_SESSION ['carts'] )) {
    $cart = count($_SESSION ['carts']);
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cake | Home</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
	
	<style>
	#slideshow { 
  margin: 50px auto; 
  position: relative; 
  width: 100%; 
  height: 250px; 
  padding: 10px; 
  box-shadow: 0 0 20px rgba(0,0,0,0.4); 
}

#slideshow > div { 
  position: absolute; 
  top: 10px; 
  left: 10px; 
  right: 10px; 
  bottom: 10px; 
}
	</style>
	
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">
            <div class="offcanvas__cart__links">
                <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                <a href="#"><img src="img/icon/heart.png" alt=""></a>
            </div>
            <div class="offcanvas__cart__item">
                <a href="checkout.php"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
                <div class="cart__price">Cart: <span>$0.00</span></div>
            </div>
        </div>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
            <ul>
               
                <li><a href="#">Sign in</a> <span class="arrow_carrot-down"></span></li>
                <li><a href="#">Sign in</a> <span class="arrow_carrot-down"></span></li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                                <ul>
                                <li>Create new account<span class="arrow_carrot-down"></span>
								<ul>
								<li>
								<a href="./registration.php"><span style="color:#fff">Customer</span></a>
								</li>
								<li>
								<a href="./caker-registration.php"><span style="color:#fff">Caker</span></a> 
								</li>
								</ul>
								</li>
                                <?php
                            if(!empty($_SESSION['user']))
                            {
                                echo '<li><a href="./logout.php">Logout</a> <span class="arrow_carrot-down"></span></li>';
								echo '<li><a href="./my-profile.php">My Profile</a> <span class="arrow_carrot-right"></span></li>';
                            }
                            else
                            {
                                echo '<li>
                                Sign in <span class="arrow_carrot-down"></span>
                                <ul>
                                <li><a href="./admin/admin-login.php"><span style="color:#fff">Admin</span></a></li>
                                <li><a href="./login.php"><span style="color:#fff">Customer</span></a></li>
								<li><a href="./caker/cakers-login.php"><span style="color:#fff">Caker</span></a></li>
                                </ul>
                                </li>';
                                
                                
                            }
                            ?>   
                                
                                
                                </ul>
                            </div>
                            <div class="header__logo">
                                <a href="./index.php"><h3 style="color:#f08632;">Bake N Pack</h3></a>
                            </div>
                            <div class="header__top__right">
                                <div class="header__top__right__links">
                                      
                                </div>
                                <div class="header__top__right__cart">
								<div class="cart__price">Cart <span></span></div>
                                    <a href="shoping-cart.php"><img src="img/icon/cart.png" alt=""> <span><?php echo $cart;?></span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class=" <?= ($activePage == 'index') ? 'active':''; ?>"><a href="./index.php">Home</a></li>
							<li class="<?= ($activePage == 'shop' || $activePage == 'search-cake') ? 'active':''; ?>"><a  href="./shop.php">Shop</a></li>
                            
                            <?php
                            if(!empty($_SESSION['user']))
                            {
                                $id = $_SESSION['user_id'];
$ret=mysqli_query($con,"select count(*) as total from tbl_user_order where user_id = $id  and status = 'Ordered'");

while ($row=mysqli_fetch_array($ret)) {

$total_order = $row['total'];

}
if (isset($_SESSION['my-order-visited'])) {

      echo '<li class="<?= ($activePage == "my-order") ? "active":""; ?><a  href="./my-order.php">My order</a></li>';
}
else
{
  echo '<li class="<?= ($activePage == "my-order") ? "active":""; ?><a  href="./my-order.php">My order <span class="badge badge-light">'.$total_order.'</span></a></li>';
}
                              
                            }
                            ?>
							
                            <li class="<?= ($activePage == 'about') ? 'active':''; ?>"><a  href="./about.php">About</a></li>
                            <li class="<?= ($activePage == 'contact') ? 'active':''; ?>"><a   href="./contact.php">Contact</a></li>
                            <?php
                            if(!empty($_SESSION['user']))
                            {
                               // echo '<li style="float:right;top:10px"><i class="btn btn-primary">Hi User!!</i></li>';
                            }
                            ?>
							 
							
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->