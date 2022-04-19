<?php
   ob_start();  //FOR STOP REPEATE THE ACTION WHEN WE REFRASH
   include('Includes/Header.php');
   
   require('Includes/Connection.php'); 
   
   if(isset($_GET['id1'])){
    $query ="DELETE FROM order WHERE Order_Id ={$_GET['id1']}";
    mysqli_query($Conn,$query);
    header("Location: Manage_Order.php");
    }

?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6"><!--FORM-->
                                <div class="card">
                                    <div class="card-header">Order Information</div>
                                </div>
                            </div> 
                            <div class="col-lg-9"><!--TABLE-->
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
                                                <th>Customer Id</th>
                                                <th>Total</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $query2 = "SELECT * FROM `order`";
                                             $result2 = mysqli_query($Conn , $query2);
                                            while($order = mysqli_fetch_assoc($result2)){
                                            echo '<tr>';
                                            echo "<td>{$order['Order_Id']}</td>";
                                            echo "<td>{$order['Customer_Id']}</td>";
                                            echo "<td>{$order['Total']}</td>";
                                            echo "<td><a href='Manage_Order.php?id1={$order['Order_Id']}'>Delete</a></td>"; 
                                            echo "</tr>";
                                             }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                </div>

<?php
           include('Includes/Footer.php')
?>