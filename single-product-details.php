<?php
session_start();
ob_start();
 require_once('admin/includes/connection.php');
 include_once('includes/header.php');
 $path = "../admin/images/";
 $query = "SELECT * FROM product WHERE Product_Id = {$_GET['id1']}";
 $result = mysqli_query($Conn , $query);
 if (!isset($_SESSION['cart'])) {
     $_SESSION['cart'] = array();

 }
 if(isset($_POST['addtocart'])){
    $_SESSION['cart'][] = $_POST['addtocart'];


 }
 
   
 

 
 //print_r($_SESSION);

?>


    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->

        
        <!-- Single Product Description -->
        <?php
                $query = "SELECT * FROM product WHERE Product_Id={$_GET['id1']}";
                $result = mysqli_query($Conn , $query);
               while( $pro = mysqli_fetch_assoc($result)){
                    echo "
                    <div class='single_product_thumb clearfix'>
            
                <img src='admin/images/$pro[Product_Image]' style='width: 400px;'>
            
        </div>

                    <div class='single_product_desc clearfix'>
               
           
            <a href=''>
                <h2>{$pro['Product_Name']}</h2>
            </a>
            <p class='product-price'> {$pro['Price']}$</p>
           <p class='product-desc'> {$pro['Detalis']}</p>";
}
              ?>
                
                "<!-- Form -->
            <form class='cart-form clearfix' method='post'>"
                <!-- Select Box -->
                <div class='select-box d-flex mt-50 mb-30'>
                  
                </div>
                <!-- Cart & Favourite Box -->
                <div class='cart-fav-box d-flex align-items-center'>
                    <!-- Cart -->
                    <?php $cartId= $_GET['id1'] ;
                    
                    echo "<button type='submit' name='addtocart' value=' $cartId ' class='btn essence-btn'>Add to cart</button>";
                    ?>
                    <!-- Favourite -->
                    <div class='product-favourite ml-4'>
                        <a href='' class='favme fa fa-heart'></a>
                    </div>
                </div>
            </form>
        </div>
                            
               
        
    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <?php
   include_once('includes/footer.php');
   ?>
</body>

</html>
    <!-- ##### Single Product Details Area End ##### -->

    
<?php
    include('Includes/Footer.php');
?>
