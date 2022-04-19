<?php
Session_Start();
require('Includes/Connection.php');
if(!isset($_SESSION['id'])){
    header('Location: login.php');
    $user= "";
}else{
    $user=$_SESSION['id'];
    $query="SELECT * FROM Admin ";
    $result=mysqli_query($Conn,$query);
    while($admin=mysqli_fetch_assoc($result)){
        $user=$admin ['Admin_Id'];
    }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

<!-- Font Awesome Icon-->
    <script src="https://kit.fontawesome.com/c95b50c83e.js" crossorigin="anonymous"></script>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar" style="background-color: #365b6d; color: #f7f7f7;">
                <div class="container-fluid">
                    <div class="header-mobile-inner" >
                        <a class="logo" href="index.html" >
                            <img src="images/icon/i.GEEK for PC_03.png" alt="i.GEEK for PC"  width="250px"/>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="Index.php"><!--Admin Dashboard-->
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>                          
                                <li class="has-sub">
                            <a class="js-arrow" href="Manage_Admin.php"><!--Manage Admin-->
                            <i class="fa-solid fa-user"></i>Manage Admin</a>                          
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="Manage_Category.php"><!--Manage Category-->
                            <i class="fa-solid fa-bars"></i>Manage Category</a>                          
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="Manage_Product.php"><!--Manage Product-->
                            <i class="fa-solid fa-box-open"></i>Manage Product</a>                          
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="Manage_User.php"><!--Manage User-->
                            <i class="fa-solid fa-users"></i>Manage User</a>                          
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="Manage_Order.php"><!--Manage Order-->
                            <i class="fa-solid fa-file-lines"></i>Manage Order</a>                          
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo" style="background-color: #365b6d; color: #f7f7f7;">
                <a href="#">
                    <img src="images/icon/i.GEEK for PC_03.png" alt="i.GEEK for PC" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="Index.php"><!--Admin Dashboard-->
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>                           
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="Manage_Admin.php"><!--Manage Admin-->
                            <i class="fa-solid fa-user"></i>Manage Admin</a>                          
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="Manage_Category.php"><!--Manage Category-->
                            <i class="fa-solid fa-bars"></i>Manage Category</a>                          
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="Manage_Product.php"><!--Manage Product-->
                            <i class="fa-solid fa-box-open"></i>Manage Product</a>                          
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="Manage_User.php"><!--Manage User-->
                            <i class="fa-solid fa-users"></i>Manage User</a>                          
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="Manage_Order.php"><!--Manage Order-->
                            <i class="fa-solid fa-file-lines"></i>Manage Order</a>                          
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop" style="background-color: #365b6d;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            
                            <div class="header-button" style="background-color: #365b6d;">
                                
                                <div class="account-wrap" style="position:absolute; right:20px;">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content" >
                                            <a class="js-acc-btn" href="#" style="color: #f7f7f7;"><?php
                                            if($user!=""){
                                                $query="SELECT * FROM Admin Where Admin_Id={$_SESSION['id']}";
                                                $result=mysqli_query($Conn,$query);
                                                while($admin=mysqli_fetch_assoc($result)){
                                                    echo "<h4>".$admin['Admin_Name']."</h4>";
                                                }
                                            }
                                            ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php
                                                        if($user!=""){
                                                            $query="SELECT * FROM Admin Where Admin_Id={$_SESSION['id']}";
                                                            $result=mysqli_query($Conn,$query);
                                                            while($admin=mysqli_fetch_assoc($result)){
                                                                echo "<h4>".$admin['Admin_Name']."</h4>";
                                                            }
                                                        }
                                                        ?></a>
                                                    </h5>
                                                    <span class="email"><?php
                                                        if($user!=""){
                                                            $query="SELECT * FROM Admin Where Admin_Id={$_SESSION['id']}";
                                                            $result=mysqli_query($Conn,$query);
                                                            while($admin=mysqli_fetch_assoc($result)){
                                                                echo "<h4>".$admin['Email']."</h4>";
                                                            }
                                                        }
                                                        ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
