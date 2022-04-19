<?php 

require('Admin/Includes/Connection.php');

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM user WHERE Email='$email'";
		$result = mysqli_query($Conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user (User_Name, Email, Password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($Conn, $sql);
			if ($result) {
				$error="Wow! User Registration Completed.";
				echo "<div class='alert alert-danger'>.{$error}.</div>";
				header("Location: index.php");
											
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";}
			else {
				$error="Woops! Something Wrong Went.";
				echo "<div class='alert alert-danger'>.{$error}.</div>";
				
			}
		} else {
			$error="Email Already Exists.";
			echo "<div class='alert alert-danger'>.{$error}.</div>";
		}
		
	} else {
		$error="Password Not Matched.";
		echo "<div class='alert alert-danger'>.{$error}.</div>";
		
}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register Users</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

	
<body class="animsition" >
    <div class="page-wrapper"   >
        <div class="page-content--bge5" >
            <div class="container"  >
                <div class="login-wrap" >
                    <div class="login-content"  style="background-color: #365b6d; color: #f7f7f7;" >
                        <div class="login-logo"  style="background-color: #365b6d; color: #f7f7f7;" >
                            <a href="index.php">
								<img src="Admin/images/icon/i.GEEK for PC_03.png" alt="i.GEEK for PC"  width="250px"/>
                            </a>
                        </div>
						<div class="login-form"  style="background-color: #365b6d; color: #f7f7f7;" >
							<form action="" method="POST" class="login-email">
           						<h4  style="color: #f7f7f7; text-align: center;" align >Register</h4>
								<div class="form-group">
                                    <label>User Name</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="User Name">
                                </div>
								<div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" value="<?php echo $email; ?>
									" required>
                                </div>
								<div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password"
									value="<?php echo $_POST['password']; ?>" required>
                                </div>
								<div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="cpassword" placeholder="Confirm Password"
									value="<?php echo $_POST['cpassword']; ?>" required>
                                </div>
                                <div class="form-group">
            					<button class="au-btn au-btn--block  m-b-20" type="submit" name="submit"  style="background-color: #41c1ba; color: #365b6d;" >Register</button>
								</div>
								<p class="login-register-text">Have an account? <a href="login_user.php" style="color: #41c1ba;">Login Here</a>.</p>
								<p class="login-register-text">Back to <a href="index.php" style="color: #41c1ba;">Home Page</a>.</p>
								
							</form>
						</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
	
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->