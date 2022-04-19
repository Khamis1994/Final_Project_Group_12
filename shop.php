<?php
   ob_start();  //FOR STOP REPEATE THE ACTION WHEN WE REFRASH
   session_start();

   include('Includes/Header.php');
   
   require('Admin/Includes/Connection.php'); 

   if(isset($_GET['id'])){
    $query_2 ="SELECT * FROM product WHERE Category_Id={$_GET['id']} "; // ORDER BY Product_Id ASC
    $result_2=mysqli_query($Conn,$query_2);
   } 
   else {
    $query_2="SELECT * FROM product ";
    $result_2= mysqli_query($Conn,$query_2);}


?>
   
   <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(Admin/images/icon/Shop_BG.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>SHOP</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catagories</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <?php
                                    echo "<li>";
                                    echo "<a href='Shop.php'>";
                                    echo "All";
                                    echo "</a>";
                                    echo "</li>";

                                    $query_1="SELECT * FROM category ORDER BY Category_Id ASC ";
                                    $result_1= mysqli_query($Conn,$query_1);
                                    if (mysqli_num_rows($result_1)>0){

                                        while ($cat=mysqli_fetch_array($result_1)){
                                    ?>
                                            <li data-target="#"> <!-- < ?php $cat_ID=$cat["Category_Id"];?> < ?php $cat["Category_Id"];?>-->
                                            <?php 
                                                echo "<a href='Shop.php?id= {$cat['Category_Id']};'>";
                                                echo $cat['Category_Name'];
                                                echo "</a>" ?> 
                                            </li>
                                            <?php 
                                            }
                                            }
                                            ?>    
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget price mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Filter by</h6>
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Price</p>

                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="0" data-max="3000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="3000" data-label-result="Range:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Range: $00.00 - $3000.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span>150</span> products found</p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Price: $$ - $</option>
                                                <option value="value">Price: $ - $$</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Single Product -->
                            <?php
                            
                            if (mysqli_num_rows($result_2)>0){
                                

                                while ($product=mysqli_fetch_array($result_2)){
                                    
                                        
                            ?>
                            <div class="col-12 col-sm-6 col-lg-4 single-product-wrapper">
                                <div class="product-img" width="100px" height="100px">
                                    <img src="<?php echo "Admin/images/".$product["Product_Image"];?>" alt="Server Error" >
                                </div>
                                <?php
                                echo "<a href='single-product-details.PHP?id1={$product['Product_Id']}'><h6>" ;
                                echo $product["Product_Name"];
                                echo "</h6></a>";
                                ?>
                                <h5 class="product-price" style="color:blue;" ><?php echo $product["Price"]."$";?></h5>
                                <div class="row"><h6 style="margin-top: 6px; margin-left:15px; width:100px;">Quantity</h6><input type="text" name="quantity" class="form-control" value="1" style="width: 120px;"></div>
                                <form method="post" action="shop.php?action=add&id=<?php echo $product["Product_Id"];?>">
                                    <input type="hidden" name="hidden_id" class="form-control" value="<?php echo $product["Product_Id"];?>">
                                    <input type="hidden" name="hidden_name" class="form-control" value="<?php echo $product["Product_Name"];?>">
                                    <input type="hidden" name="hidden_price" class="form-control" value="<?php echo $product["Price"];?>">
                                    <input type="Submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                                </form>  
                            </div>
                                
                            
                            <?php
                                }}                           
                                ?>
                        </div>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

<?php
    include('Includes/Footer.php');
?>