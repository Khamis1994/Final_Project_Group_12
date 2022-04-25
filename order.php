<?php
ob_start();
Session_Start();
require_once('admin/includes/connection.php');
include_once('includes/header.php');
$total=0;
$tot=0;
$array =array();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <title>Check The Order</title>
<link rel="stylesheet" href="style.css">

<link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <style type="text/css">
body {
  font-family: "Nunito", sans-serif;
  color: #333;
  font-weight: 300;
  line-height: 1.6; 
 
}</style>
</head>
<style type="text/css">
  body, html {
    height: 100%;
}

/* The hero image */
.hero-image {
 
  background-image: url("two-ikea-co-workers-leaning-over-a-wooden-frame-they-are-bot-6acd9b8e7d70eebc402c1df9c424f172.webp");
border-radius: 30px;   
  height: 100%; border: .1px solid black;
}
.hero-text {
  margin: 50px;
  background-color: #111111;
  opacity: 0.6;
}

  </style>
</head>

<body>

  <style>
table.GeneratedTable {
  width: 1000px;
  background-color: #ffffff;
  border-collapse: collapse;
  border-width: 3px;
  border-color: black;
  border-style: solid;
  color: black;
}

table.GeneratedTable td, table.GeneratedTable th {
  border-width: 3px;
  height: 50px;
  border-color: #ddd;
  border-style: solid;
  padding: 5px;
}

table.GeneratedTable thead {
  background-color:  #365b6d;
}
#btn{
  width: 120px;
  border-radius: 10px;
  padding: 10px;
  color: black;
  font-weight: bold;
  background-color:  #365b6d;
  margin: 10px;
  border: none;

}
</style>
<br><br><br><br><br><br>
<form class="checkout-form" method="POST">
<?php 

 

echo "<center><table class='GeneratedTable'>";
  echo "<thead>";
    echo "<tr>";
      echo "<th>name</th>";
      echo "<th>E-mail</th>";
      echo "<th>Total</th>";
       

    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
    echo "<tr>";
     if($_SESSION['id']!=""){
            $query = "SELECT * FROM user WHERE User_Id = {$_SESSION['id']}";
                  $result = mysqli_query($Conn,$query);
                while($cus = mysqli_fetch_assoc($result)){
      echo "<td>{$cus['User_Name']}</td>";
     // echo "<td>{$cus['phone']}</td>";
      echo "<td>{$cus['Email']}</td>";
      //echo "<td>{$cus['card_num']}</td>";
      foreach ($_SESSION['cart'] as $key => $value ) {
                      $cart= $_SESSION['cart'][$key];
                      $arr=explode(",",$cart);
                      $id=$arr[0];
                      
                      $query1="SELECT * FROM product where Product_Id=$id";

                        $result1=mysqli_query($Conn,$query1);
                      $pro=mysqli_fetch_assoc($result1);    
                      
                      
                      $total = $total +$pro['Price'];
                      $tax=0.16*$total;
                      $tot_tax= $total + $tax ;
            
                    }
      echo "<td>$$tot_tax</td>";
      }}
    echo "</tr>";
  echo "</tbody>";

echo "</table></center>";




                    
if (isset($_POST['placeorder'])){
 $qrr2=" INSERT INTO `order1`(`Customer_Id`, `Total`) VALUES ('$_SESSION[id]','$total')";

                        // $qrr2 ="INSERT INTO order (customer_id, total) 
                          // VALUES ('$_SESSION[log]','$total')";
                          
                         mysqli_query($Conn, $qrr2);

                         
                           

                         unset($_SESSION['cart']);
                         header("location:order.php");

                    }



?>


<center><button class="site-btn btn-full" id="btn" name="placeorder">Place Order</button></center>
<br><br><br><br><br>
</form>

<br><br><br><br><br><br>
<br><br><br><br><br><br>
<?php include_once('includes/footer.php') ?>
</body>
</html>