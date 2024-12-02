<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cake | Template</title>

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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

   

    <!-- Header Section Begin -->
    <header class="header">
       
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class=" <?= ($activePage == 'admin-home') ? 'active':''; ?>"><a href="./admin-home.php">Home</a></li>
                            <li class=" <?= ($activePage == 'admin-cake') ? 'active':''; ?>"><a href="./admin-cake.php">Cakes</a></li>
                            <li class=" <?= ($activePage == 'admin-categories') ? 'active':''; ?>"><a href="./admin-categories.php">View Complaints</a></li>
                            <li class=" <?= ($activePage == 'admin-categories') ? 'active':''; ?>"><a href="./admin-categories.php">View Feedback</a></li>
                            <li class=" <?= ($activePage == 'admin-categories') ? 'active':''; ?>"><a href="./admin-categories.php">Categoriesss</a></li>
                           <!-- <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./wisslist.html">Wisslist</a></li>
                                    <li><a href="./Class.html">Class</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>-->
                            <li class=" <?= ($activePage == 'admin-view-users') ? 'active':''; ?>"><a href="./admin-view-users.php">View Users</a></li>
                            <li class=" <?= ($activePage == 'admin-user-order') ? 'active':''; ?>"><a href="./admin-user-order.php">User Order</a></li>
							<li><a href="./admin-logout.php">Logout</a></li>
                            <li style="float:right;top:10px"><i class="btn btn-primary">Hi Admin!!</i></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
   