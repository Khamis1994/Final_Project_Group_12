<?php
session_start();
ob_start();
require_once('admin/includes/connection.php');
include_once('includes/header.php');


 if (!isset($_SESSION['cart'])) {
     $_SESSION['cart'] = array();

 }
 if (!isset($_SESSION['id'])) {
  header("location: login_user.php");
  $user = "";
}
else {
  $user = $_SESSION['id'];
 $query= "SELECT * FROM user";
$result = mysqli_query($Conn,$query);
   
    while($cus = mysqli_fetch_assoc($result)){
      $user = $cus['User_Id'];
    }

}
 if (isset($_POST['addtocart'])) {
    
     array_push($_SESSION['cart'],$_GET['id']);
     
 }
 if (isset($_POST['removecart'])) {
     $id=$_POST['removecart'];
     unset($_SESSION['cart'][$id]);
     
 }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> cart</title>
<link rel="stylesheet" href="style.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- Js -->
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/min/waypoints.min.js"></script>
    <script src="js/jquery.counterup.js"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/google-map-init.js"></script>


    <script src="js/main.js"></script>


  </head>
  <style type="text/css">

<link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

<style type="text/css">

.cart-page{
  margin: 80px auto; 
}
.account-wrap a{
  text-decoration: none;
  color: #000;
  padding-left: 500px;
}
#Menuitems {
  background-color: #365b6d;
  height: 100px;
}
#Menuitems li{
 display: inline-block;
 padding: 40px;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
#Menuitems li:hover {
  background-color: #f41068;
}
#Menuitems a{
  text-transform: uppercase;
  font-weight: 600;
  color: #000;
  padding: 20px;
  text-decoration: none;
}
.nav a {
  text-transform: uppercase;
  font-weight: 600;

  color: #000;
  padding: 30px;
}
.nav a:hover {
  color: #f41068;
}
table{
  width: 100%;
  border-collapse: collapse;
}
.cart-info{
  display: flex;
  flex-wrap: wrap;

}
th{
  text-align: left;
  padding: 5px;
  color: #fff;
  background:#365b6d ;
  font-weight: normal;
}
td{
  padding: 20px 10px;
}
td input{
  width: 40px;
  height: 30px;
  padding: 5px;
}
td a{
  color:#0D1E9C;
  font-size: 12px;
}
td img{
  margin-right: 30px;
}
.total-price{
  display: flex;
  justify-content: flex-end;
}
.total-price table{
  border-top: 3px solid #365b6d;
  width: 100%;
  max-width: 350px;

}

td:last-child{
  text-align: center;
}
th:last-child{
  text-align: center;
}
.btn{
  background-color: #365b6d;
  color:black;
}
  </style>
</head>
<body>
<div class="header">
  <div class="conatiner"style="background-color: #365b6d; color: #f7f7f7">
    <div class="navbar" style="background-color: #365b6d; color: #f7f7f7;">
      <div class="logo" style="background-color: #365b6d; color: #f7f7f7;" >
        <img src="Admin/images/icon/i.GEEK for PC_02.png" width="125px" style="margin-top:20px;">
      </div>
      <div class="header-button">
        <div class="account-wrap">
          <div class="account-item clearfix js-item-menu">
            <div class="content">
              <a class="js-acc-btn" href="#"> <?php
                if($user!=""){
                  $query = "SELECT * FROM User WHERE User_Id = {$_SESSION['id']}";
                  $result = mysqli_query($Conn,$query);
                  while($cus = mysqli_fetch_assoc($result)){
                    echo '<h2 style="background-color: #365b6d; color: #f7f7f7">Welcome '.$cus['User_Name'] . '!</h2>';}
                  }
              ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>
<!-- cart detalis--->
  <div class='small-contanier cart-page' style="background-color: #365b6d; color: #f7f7f7">
    <?php
    echo '<br><br>';
    echo "<table>";
    echo "<tr>";
    echo "<th>Product</th>";
    echo "<th>Total</th>";
    echo  "</tr>";
    if (isset($_SESSION['cart'])) {
      $total = 0;
      $tax=0;
      $tot_tax= 0 ;
      foreach ($_SESSION['cart'] as $key => $value) {
      $query1 = "SELECT * FROM product WHERE Product_Id = $value";
      $result1 = mysqli_query($Conn , $query1);
      $m = mysqli_fetch_assoc($result1);
      $total = $total +$m['Price'];
      $tax=0.16*$total;
      $tot_tax= $total + $tax ;
      echo "<tr>";
      $quer2="SELECT Category_Image,Category_Name FROM category INNER JOIN product ON category.Category_Id = {$m['Category_Id']}";
      $result2 = mysqli_query($Conn , $quer2);
      $s = mysqli_fetch_assoc($result2);
      echo "<td>";
      echo "<div class='cart-info'>";
      echo "<img src='admin/img/{$s['Category_Image']}' width= '250 px' height= '250 px' >";
      echo "<div>";
      echo "<p>Category: &nbsp &nbsp{$s['Category_Name']}</p>";
      echo" <p>Details: &nbsp &nbsp{$m['Product_Name']}</p>";
      echo "<small>price: &nbsp &nbsp $ {$m['Price']}</small>";
      echo "<br>";
      echo "<form method= 'post'>";
      echo "<button type='submit' name='removecart' value='$key' class='product-remove' <a href= 'cart.php?{$m['Product_Id']}'>remove</a></button>";
      echo "</form>";
      echo "</div>";
      echo "</div>";
      echo "</td>";
      echo "<td>$ {$m['Price']}</td>";
      echo "</tr>";}}
      else {
        $total = 0;
        $tax=0;
        $tot_tax= 0 ;
      }
      echo "<tr>";
      echo "</table>";
      echo "</div>";
      echo "<div class='total-price'>
      <table>
        <tr>
          <td>Total price</td>
          <td>$".$total."</td>
        </tr>
        <tr>
          <td>Tax</td>
          <td>$".$tax."</td>
        </tr>
        <tr>
          <td>Total</td>
          <td>$".$tot_tax."</td>
        </tr>
      </table>
      </div>";
      ?>
  </div>
  <?php
    $query = "SELECT * FROM User";
    $result = mysqli_query($Conn ,$query);
    $cus = mysqli_fetch_assoc($result);
    echo "<center>    
            <h4>
              <a href='order.php?id={$cus['User_Id']}' class='btn' style=' background-color: #41c1ba; color: #365b6d ;margin'>
                Check The Order
              </a>
          </center>";
                 
  ?>


<br>
<br><br>
<center><a href="index.php" class="btn" style=" background-color: #41c1ba; color: #365b6d ;">Back</a></center>
<br><br>
<br>
<?php include_once('includes/footer.php') ?>
</body>
</html>