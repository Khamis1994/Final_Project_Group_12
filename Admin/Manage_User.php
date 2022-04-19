<?php
    ob_start();  //FOR STOP REPEATE THE ACTION WHEN WE REFRASH
    include('Includes/Header.php');
    require('Includes/Connection.php');
    
    if(isset($_GET['id1'])){
        $query ="DELETE FROM user WHERE User_ID ={$_GET['id1']}";
        $Result=mysqli_query($Conn,$query);
        header("Location: Manage_User.php");
    }
    
?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6"><!--FORM-->
                                <div class="card">
                                    <div class="card-header">User Information</div>
                                </div>
                            </div> 
                            <div class="col-lg-9"><!--TABLE-->
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_1="SELECT * FROM user";
                                            $Result=mysqli_query($Conn,$query_1);
                                            while($User=mysqli_fetch_assoc($Result)){
                                            echo "<tr>";
                                            echo "<td>{$User['User_Id']}</td>";
                                            echo "<td>{$User['User_Name']}</td>";
                                            echo "<td>{$User['Email']}</td>";
                                            echo "<td><a href='Manage_User.php?id1={$User['User_Id']}'>Delete</a></td>";
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



<?php
           include('Includes/Footer.php')
?>