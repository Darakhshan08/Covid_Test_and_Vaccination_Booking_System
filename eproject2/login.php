
  <?php

//learn from w3schools.com
//Unset all the server side variables

session_start();

$_SESSION["user"]="";
$_SESSION["user_type"]="";

// Set the new timezone
date_default_timezone_set('Asia/Karachi');
$date = date('Y-m-d');

$_SESSION["date"]=$date;


//import database
include("connection.php");





if($_POST){

    $email=$_POST['email']; 
    $password=$_POST['password'];
    
    $error='<label for="promter" class="form-label"></label>';

    $result= $con->query("SELECT * from web_user where email='$email'");
    if($result->num_rows==1){
        $utype=$result->fetch_assoc()['user_type'];
        if ($utype=='p'){
            $checker = $con->query("SELECT * from patient where p_email='$email' and p_password='$password'");
            if ($checker->num_rows==1){


                //   Patient dashbord
                $_SESSION['user']=$email;
                $_SESSION['user_type']='p';
                
                header('location: patient/index-2.php');

            }else{  
                $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
            }

        }elseif($utype=='a'){
            $checker = $con->query("SELECT * from admin where a_email='$email' and a_password='$password'");
            if ($checker->num_rows==1){


                //   Admin dashbord
                $_SESSION['user']=$email;
                $_SESSION['user_type']='a';
                
                header('location: admin/index-2.php');

            }else{
                $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
            }


        }elseif($utype=='h'){
            $checker = $con->query("SELECT * from hospital where h_email='$email' and h_password='$password'");
            if ($checker->num_rows==1){


                //   Hospital dashbord
                $_SESSION['user']=$email;
                $_SESSION['user_type']='h';
                header('location: hospital/index-2.php');

            }else{
                $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
            }

        }
        
    }else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email or Maybe your login rejected by Admin</label>';
    }






    
}else{
    $error='<label for="promter" class="form-label">&nbsp;</label>';
}

?>

<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- [if lt IE 9]> -->
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<!-- <![endif] -->
</head>  

 <body>
     <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="" class="form-signin" method="POST">
						<div class="account-logo">
                            <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="text" name="email" autofocus="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="signup.php">Register Now</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script> 
</body>

</html>
<!-- login23:12 -->
