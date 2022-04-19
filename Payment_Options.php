<?php
   ob_start();  //FOR STOP REPEATE THE ACTION WHEN WE REFRASH

   include('Includes/Header.php');
?>
   
   <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(Admin/images/icon/Shop_BG.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Payment Options</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
<div style="margin:20px;">
    <h4>Payment Options</h4>
    <h6 style="margin:20px;">We Accept:</h6>
    <ul style="margin:40px;">
        <li>Master Card</li>
        <li>Visa Card</li>
        <li>Cash On Delivery</li>
    </ul>
    
</div>
<?php
    include('Includes/Footer.php');
?>