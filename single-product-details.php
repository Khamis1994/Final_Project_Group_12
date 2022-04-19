<?php
   ob_start();  //FOR STOP REPEATE THE ACTION WHEN WE REFRASH
   session_start();

   include('Includes/Header.php');
   
   require('Admin/Includes/Connection.php'); 

   if(isset($_GET['id1'])){
    $query_2 ="SELECT * FROM product WHERE Product_Id={$_GET['id1']} "; // ORDER BY Product_Id ASC
    $result_2=mysqli_query($Conn,$query_2);
    $product=mysqli_fetch_assoc($result_2);
   } 

?>
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">
        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <img src="<?php echo "Admin/images/".$product["Product_Image"];?>" alt="Server Error">
        </div>
        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <h2><?php echo $product["Product_Name"];?></h2>
            <p class="product-price"><?php echo $product["Price"]."$";?></p>
            <p class="product-desc"><?php echo $product["Detalis"];?></p>
            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

    
<?php
    include('Includes/Footer.php');
?>