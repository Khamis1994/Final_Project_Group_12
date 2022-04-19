<?php

require('Admin/Includes/Connection.php');
if(!isset($_SESSION['id'])){
    
    $user_id= "";
}else{
    $user=$_SESSION['id'];
    $query="SELECT * FROM User ";
    $result=mysqli_query($Conn,$query);
    while($user=mysqli_fetch_assoc($result)){
        $user_id=$user ['User_Id'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>i.GEEK for PC</title>

    <!-- Favicon  -->
    <link rel="icon" href="Admin/images/icon/i.GEEK for PC_02.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
  
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area" style="background-color: #365b6d; color: #f7f7f7;" >
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between" style="background-color: #365b6d; color: #f7f7f7;">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav" style="background-color: #365b6d; color: #f7f7f7;">
                <!-- Logo -->
                <a class="nav-brand" href="index.php" style="background-color: #365b6d; color: #f7f7f7;" ><img src="Admin/images/icon/i.GEEK for PC_03.png" alt="i.GEEK for PC"  width="250px"></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="shop.php"style="background-color: #365b6d; color: #f7f7f7;">Shop</a>
                                <div class="megamenu" style="background-color: #f7f7f7; color: #41c1ba; ">

                                    
                                    <?php
                                    $Item_No=0;
                                    $query_5="SELECT * FROM category ORDER BY Category_Name ASC ";
                                    $result_5= mysqli_query($Conn,$query_5);
                                    if (mysqli_num_rows($result_5)>0 ){
                                        echo "<ul class='single-mega cn-col-3'>" ;   
                                        while ($cat4=mysqli_fetch_array($result_5) and $Item_No<5){
                                            echo "<li>"; 
                                            echo "<a href='Shop.php?id= {$cat4['Category_Id']};'>";
                                            echo "<img src='Admin/images/" ;
                                            echo  $cat4['Category_Image'];
                                            echo  "'alt='";
                                            echo  $cat4['Category_Id'];
                                            echo  "'width='20px' height='20px' margen-right=10px>";
                                            echo str_repeat('&nbsp;', 5);
                                            echo $cat4["Category_Name"];
                                            echo "</a>"; 
                                            echo "</li>";
                                            $Item_No=$Item_No+1;
                                        }
                                        echo "</ul>" ;
                                        echo "<ul class='single-mega cn-col-3'>" ;
                                        while ($cat4=mysqli_fetch_array($result_5)  and $Item_No<10){
                                            echo "<li>"; 
                                            echo "<a href='Shop.php?id= {$cat4['Category_Id']};'>";
                                            echo "<img src='Admin/images/" ;
                                            echo  $cat4['Category_Image'];
                                            echo  "'alt='";
                                            echo  $cat4['Category_Id'];
                                            echo  "'width='20px' height='20px' margen-right=10px>";
                                            echo str_repeat('&nbsp;', 5);
                                            echo $cat4['Category_Name'];
                                            echo "</a>"; 
                                            echo "</li>";
                                            $Item_No=$Item_No+1;
                                        }
                                        echo "</ul>" ;
                                        echo "<ul class='single-mega cn-col-3'>" ;
                                        while ($cat4=mysqli_fetch_array($result_5) and $Item_No<15){
                                            echo "<li>"; 
                                            echo "<a href='Shop.php?id= {$cat4['Category_Id']};'>";
                                            echo "<img src='Admin/images/" ;
                                            echo  $cat4['Category_Image'];
                                            echo  "'alt='";
                                            echo  $cat4['Category_Id'];
                                            echo  "'width='20px' height='20px' margen-right=10px>";
                                            echo str_repeat('&nbsp;', 5);
                                            echo $cat4['Category_Name'];
                                            echo "</a>"; 
                                            echo "</li>";
                                            $Item_No=$Item_No+1;
                                        }
                                        echo "</ul>" ;
                                        echo "<ul class='single-mega cn-col-3'>" ;
                                        while ($cat4=mysqli_fetch_array($result_5) and $Item_No<20){
                                            echo "<li>"; 
                                            echo "<a href='Shop.php?id= {$cat4['Category_Id']};'>";
                                            echo "<img src='Admin/images/" ;
                                            echo  $cat4['Category_Image'];
                                            echo  "'alt='";
                                            echo  $cat4['Category_Id'];
                                            echo  "'width='20px' height='20px' margen-right=10px>";
                                            echo str_repeat('&nbsp;', 5);
                                            echo $cat4['Category_Name'];
                                            echo "</a>"; 
                                            echo "</li>";
                                            $Item_No=$Item_No+1;
                                        }
                                    }?>
                                    
                                </div>
                            </li>
                            <li><a href="contact.php" style="background-color: #365b6d; color: #f7f7f7;">Contact</a></li>
                        </ul>
                        <?php
                echo $user_id;
                ?>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
               
              

                <!-- User Login Info -->
                <div class="classy-menu" style="background-color: #365b6d; color: #f7f7f7;">
                    <!-- Nav Start -->
                    <div class="classynav " style="background-color: #365b6d; color: #f7f7f7;">
                        <ul>
                            
                            <?PHP if(!$user_id!=""){ ?> 
                                <li>
                                    <a href='login_User.php'style='background-color: #365b6d; color: #f7f7f7;'>
                                        <div class="user-login-info" style="">
                                            <img src='img/core-img/user.svg' width='22px' height='22px' style='background-color: #365b6d; color: #f7f7f7; display: block; margin-left: auto; margin-right: 20px;  margin-top: 32px;' >
                                        </div>
                                    </a>
                                
                                </li>
                            <?PHP } else{ ?>
                                <li>
                                    <a href="#"style="background-color: #365b6d; color: #f7f7f7;">
                                        <?PHP
                                            $query="SELECT * FROM user Where User_Id={$_SESSION['id']}";
                                            $result=mysqli_query($Conn,$query);
                                            while($user=mysqli_fetch_assoc($result)){
                                                echo "<div class='user-login-info' style='display: block; margin:0px;   padding: 0px;' >"  ;
                                                echo "<br><h6 style=' background-color: #365b6d; color: #f7f7f7; text-align: center; display: block; margin:0px;   padding: 0px;' >".$user['User_Name']."</h6>";
                                                echo "</div>"  ;
                                            }
                                    
                                        ?>
                                    </a>
                                    <div class="megamenu" style="background-color: #f7f7f7; color: #41c1ba; ">
                                        <ul class='single-mega cn-col-3'>   
                                            <li>
                                                <?php
                                                    if($user_id!=""){
                                                        $query="SELECT * FROM user Where User_Id={$_SESSION['id']}";
                                                        $result=mysqli_query($Conn,$query);
                                                        while($user=mysqli_fetch_assoc($result)){
                                                            echo "<h5 style='background-color: #f7f7f7; color: #365b6d;'>".$user['User_Name']."</h5>";
                                                        }
                                                    }
                                                ?>
                                            </li>
                                            <li>
                                                <?php
                                                    if($user_id!=""){
                                                        $query="SELECT * FROM user Where User_Id={$_SESSION['id']}";
                                                        $result=mysqli_query($Conn,$query);
                                                        while($user=mysqli_fetch_assoc($result)){
                                                            echo "<h6 style='background-color: #f7f7f7; color: #365b6d;'>".$user['Email']."</h6>";
                                                        }
                                                    }
                                                ?>
                                            </li>
                                            <li>
                                                <?php if($user_id!=""){ ?>
                                                <a href="logout.php" style=" color: #41c1ba;" >Logout</a>
                                                <?php } ?>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            <?PHP } ?>
                        </ul>
                    </div>
                </div>
                               
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="checkout.php" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
