<?php

include('../connection.php');
// appointment tabe fetch function
function get_status($con,$no){
    $query = "SELECT * FROM appointment where a_id = $no";
    $run = mysqli_query($con,$query);
    $status = mysqli_fetch_assoc($run);
    return $status['status'];
// ===================================
}
session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['user_type']!='h'){
        header("location: ../login.php");
    }else{
        $useremail=$_SESSION["user"];
    }
}

 else{
    header("location: ../login.php");
}
$userrow = $con->query("SELECT * from hospital where h_email='$useremail'");
$userfetch=$userrow->fetch_assoc();
$userid= $userfetch["h_id"];
$username=$userfetch["h_name"];
$uemail=$userfetch["h_email"];


?>
<!DOCTYPE html>
<html lang="en">


<!-- index22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/animations.css">  
    <link rel="stylesheet" href="assets/css/main.css">  
    <link rel="stylesheet" href="assets/css/admin.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<style>
    .card-title{
        font-size:22px;
    }
    #t1{
        margin-bottom:100px;
    width:1600px;

    
    }
    .input-text{
        
    width: 700px;
    height: 45px;
    border-radius: 10px;
    border: 0.2px solid #78787894;
}

.header-search{
    margin-left:300px;
    margin-bottom:40px;
}
.sear{
    margin-left:200px;
    margin-bottom:30px;
    display:flex;

    

}
.ch{
    display:flex;
}
#h3{

position:absolute;
left:4%;    
top:7%;    
}
.dash-body{
    margin-left:270px;      
    position: absolute;
    /* top:50%; */

}
/* .row{
    margin-top:20px;
} */
   /* .row{
    width:1500px;
   } */
</style>

<body>
<div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index-2.html" class="logo">
                <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>COVID-19</span>
				
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <!-- <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">3</span></a> -->
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                        </div>
                       
                       
                    </div>

                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                    <!-- <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a> -->
                </li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span><?php echo $uemail  ?></span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="../logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                <h4>   <span class="" id="Icon"><i class="fa fa-hospital-o"> </i>&nbsp;&nbsp;&nbsp;&nbsp;</span>Hospital</h4> 

                        </li>

                        <li class="active">
                            <a href="index-2.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                      
						<!-- <li class="submenu"> -->
                            <!-- <a href="hospitals.php"><i class="fa fa-hospital-o"></i><span class="menu-arrow"></span>  -->
                            <!-- <ul style="display: none;">
								<li><a href="hospitals.php">View</a></li> -->
								
							<!-- </ul> -->
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-wheelchair"></i> <span>Patients</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
								<li><a href="patients.php">View</a></li>
								
							</ul>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Schedule</span></a>
                        </li>
                      
						
                        
						
					

                        <li>
                            <a href="settings.php"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
                        
                        
                      
                 
                       
                    </ul>
                </div>
            </div>
        </div>

        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                        <td width="13%" >
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Settings</p>
                                           
                    </td>
                    
                            <td width="15%">
                            
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('Asia/Karachi');
        
                                $today = date('Y-m-d');
                                // echo $today;


                                $patientrow = $con->query("select  * from  patient;");
                                $Hospitalrow = $con->query("select  * from  hospital;");
                                $appointmentrow = $con->query("select  * from  appointment where a_date>='$today';");
                                $schedulerow = $con->query("select  * from  schedule where sch_date='$today';");


                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>
                <tr>
                    <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 20px">&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <a href="?action=edit&id=<?php echo $userid ?>&error=0" class="non-style-link">
                                    <div  class="dashboard-items setting-tabs"  style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div class="btn-icon-back dashboard-icons-setting" style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                                        <div>
                                                <div class="h1-dashboard">
                                                    Account Settings  &nbsp;

                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px;">
                                                    Edit your Account Details & Change Password
                                                </div>
                                        </div>
                                                
                                    </div>
                                    </a>
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 5px">&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                            <td style="width: 25%;">
                                    <a href="?action=view&id=<?php echo $userid ?>" class="non-style-link">
                                    <div  class="dashboard-items setting-tabs"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div class="btn-icon-back dashboard-icons-setting " style="background-image: url('../img/icons/view-iceblue.svg');"></div>
                                        <div>
                                                <div class="h1-dashboard" >
                                                    View Account Details
                                                    
                                                </div><br>
                                                <div class="h3-dashboard"  style="font-size: 15px;">
                                                    View Personal information About Your Account
                                                </div>
                                        </div>
                                                
                                    </div>
                                    </a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 5px">&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                            <td style="width: 25%;">
                                    <a href="?action=drop&id=<?php echo $userid.'&name='.$username ?>" class="non-style-link">
                                    <div  class="dashboard-items setting-tabs"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div class="btn-icon-back dashboard-icons-setting" style="background-image: url('../img/icons/patients-hover.svg');"></div>
                                        <div>
                                                <div class="h1-dashboard" style="color: #ff5050;">
                                                    Delete Account
                                                    
                                                </div><br>
                                                <div class="h3-dashboard"  style="font-size: 15px;">
                                                    Will Permanently Remove your Account
                                                </div>
                                        </div>
                                                
                                    </div>
                                    </a>
                                </td>
                                
                            </tr>
                        </table>
                    </center>
                    </td>
                </tr>
            
            </table>
        </div>
    </div>
    <?php 
    if($_GET){
        
        $id=$_GET["id"];
        $action=$_GET["action"];
        if($action=='drop'){
            $nameget=$_GET["name"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="settings.php">&times;</a>
                        <div class="content">
                            You want to delete this record<br>('.substr($nameget,0,40).').
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="../admin/delete-Hospital.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="settings.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
        }elseif($action=='view'){
            $sqlmain= "select * from hospital where h_id='$id'";
            $result= $con->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["h_name"];
            $email=$row["h_email"];
            
            $nic=$row['h_nic'];
            $tele=$row['h_contect'];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2></h2>
                        <a class="close" href="settings.php">&times;</a>
                        <div class="content">
                            covid Web App<br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-hosp-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$name.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$email.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">NIC: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$nic.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Telephone: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$tele.'<br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2">
                                    <a href="settings.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        }elseif($action=='edit'){
            $sqlmain= "select * from hospital where h_id='$id'";
            $result= $con->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["h_name"];
            $email=$row["h_email"];
            
            $nic=$row['h_nic'];
            $tele=$row['h_contect'];

            $error_1=$_GET["error"];
                $errorlist= array(
                    '1'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>',
                    '2'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>',
                    '3'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>',
                    '4'=>"",
                    '0'=>'',

                );

            if($error_1!='4'){
                    echo '
                    <div id="popup1" class="overlay">
                            <div class="popup">
                            <center>
                            
                                <a class="close" href="settings.php">&times;</a> 
                                <div style="display: flex;justify-content: center;">
                                <div class="abc">
                                <table width="80%" class="sub-table scrolldown add-hosp-form-container" border="0">
                                <tr>
                                        <td class="label-td" colspan="2">'.
                                            $errorlist[$error_1]
                                        .'</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Edit Hospital Details.</p>
                                        Hospital ID : '.$id.' (Auto Generated)<br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <form action="edit-hosp.php" method="POST" class="add-new-form">
                                            <label for="Email" class="form-label">Email: </label>
                                            <input type="hidden" value="'.$id.'" name="id00">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                        <input type="hidden" name="oldemail" value="'.$email.'" >
                                        <input type="email" name="email" class="input-text" placeholder="Email Address" value="'.$email.'" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="label-td" colspan="2">
                                            <label for="name" class="form-label">Name: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="name" class="input-text" placeholder="Hospital Name" value="'.$name.'" required><br>
                                        </td>
                                        
                                    </tr>
                                    
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="nic" class="form-label">NIC: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="nic" class="input-text" placeholder="NIC Number" value="'.$nic.'" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="Tele" class="form-label">Telephone: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="tel" name="Tele" class="input-text" placeholder="Telephone Number" value="'.$tele.'" required><br>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="password" class="form-label">Password: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="password" class="input-text" placeholder="Defind a Password" required><br>
                                        </td>
                                    </tr><tr>
                                        <td class="label-td" colspan="2">
                                            <label for="cpassword" class="form-label">Conform Password: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="cpassword" class="input-text" placeholder="Conform Password" required><br>
                                        </td>
                                    </tr>
                                    
                        
                                    <tr>
                                        <td colspan="2">
                                            <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                            <input type="submit" value="Save" class="login-btn btn-primary btn">
                                        </td>
                        
                                    </tr>
                                
                                    </form>
                                    </tr>
                                </table>
                                </div>
                                </div>
                            </center>
                            <br><br>
                    </div>
                    </div>
                    ';
        }else{
            echo '
                <div id="popup1" class="overlay">
                        <div class="popup">
                        <center>
                        <br><br><br><br>
                            <h2>Edit Successfully!</h2>
                            <a class="close" href="settings.php">&times;</a>
                            <div class="content">
                                If You change your email also Please logout and login again with your new email
                                
                            </div>
                            <div style="display: flex;justify-content: center;">
                            
                            <a href="settings.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                            <a href="../logout.php" class="non-style-link"><button  class="btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;Log out&nbsp;&nbsp;</font></button></a>

                            </div>
                            <br><br>
                        </center>
                </div>
                </div>
    ';



        }; }

    }
        ?>
               
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>


<!-- index22:59-->
</html>