<?php
ob_start();
include('includes/header.php');
require('admin/includes/connection.php');
$query="SELECT * FROM category";
$result=mysqli_query($Conn,$query);
?>

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="img/product-img/product-1.jpg" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>

                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="img/product-img/product-2.jpg" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>

                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="img/product-img/product-3.jpg" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span>$274.00</span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>discount:</span> <span>-15%</span></li>
                    <li><span>total:</span> <span>$232.00</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="checkout.html" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url(img/bg-img/bg.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>i.Geek for PC</h6>
                        <h2>Checkout our products</h2>
                        <a href="shop.php" class="btn essence-btn">view products</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
            <!-- Single Catagory -->
            <?php
                 $query = "SELECT * FROM category";
                 $result = mysqli_query($Conn ,$query);
                 while ($cat = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-12 col-sm-6 col-md-4'>
                    <div class='single_catagory_area d-flex img-fluid img-responsive align-items-center justify-content-center bg-img' style='background-image: url(admin/images/{$cat['Category_Image']});'>
                        <div class='catagory-content'>";
                    echo "<a href='shop.php?id={$cat['Category_Id']}'>{$cat['Category_Name']}</a>";
                    echo "</div></div></div>";
                }
  
                ?>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(https://c0.wallpaperflare.com/preview/705/855/584/4k-wallpaper-clean-desk-earphones.jpg);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                
                                <h2>Exclusive Prices</h2>
                                <a href="shop.php" class="btn essence-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
        <img src="https://www.pngkey.com/png/detail/177-1779452_razer-logo-png-transparent-image-razer-logo.png" alt="Razer Logo Png Transparent Image - Razer Logo@pngkey.com">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
        <img src="https://www.pngkey.com/png/detail/922-9225425_hp-png-transparent-hppng-images-pluspng-hp-logo.png" alt="Hp Png Transparent Hppng Images Pluspng - Hp Logo Png White@pngkey.com">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
        <img src="https://www.pngkey.com/png/detail/74-748975_omen-by-hp-logo-png-omen-by-hp.png" alt="Omen By Hp Logo Png - Omen By Hp Logo@pngkey.com">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
        <img src="https://www.pngkey.com/png/detail/3-37191_new-svg-image-dell-logo-transparent-background.png" alt="New Svg Image - Dell Logo Transparent Background@pngkey.com">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
        <img src="https://www.pngkey.com/png/detail/177-1778023_png-svg-logo-vector-template-free-downloads-png.png" alt="Png-svg Logo, Vector, Template Free Downloads Png&svg - Logitech Logo Png Hd@pngkey.com">
        </div>
    </div>
    <!-- ##### Brands Area End ##### -->
    <?php
include('includes/footer.php');
?>

