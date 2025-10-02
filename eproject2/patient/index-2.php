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
    if(($_SESSION["user"])=="" or $_SESSION['user_type']!='p'){
        header("location: ../login.php");
    }else{
        $useremail=$_SESSION["user"];
    }
}

 else{
    header("location: ../login.php");
}
$userrow = $con->query("SELECT * from patient where p_email='$useremail'");
$userfetch=$userrow->fetch_assoc();
$userid= $userfetch["p_id"];
$username=$userfetch["p_name"];
$uemail=$userfetch["p_email"];


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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/brands.min.css">

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
        
    width: 500px;
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
						<span><?php echo $uemail ?></span>
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
                <h4>   <span class="" id="Icon"><i class="fa fa-wheelchair"> </i>&nbsp;&nbsp;&nbsp;&nbsp;</span>Patient</h4> 

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
                        <li class="">
                            <a href="hospitals.php"><i class="fa fa-hospital-o"></i> <span>All Hospitals</span></a>
                            <!-- <ul style="display: none;">
								<li><a href="patients.php">View</a></li>
								<li><a href="leaves.php">Leaves</a></li>
								
							</ul> -->
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Schedule Sessions</span></a>
                        </li>
                        <li>
                            <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>My Booking</span></a>
                        </li>
                      
						
                        
						
					

                        <li>
                            <a href="settings.php"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
                        
                        
                    
                       
                    </ul>
                </div>
            </div>
        </div>


    
        <?php 
                                date_default_timezone_set('Asia/Karachi');
        
                                $today = date('Y-m-d');
                                // echo $today;


                                $patientrow = $con->query("SELECT  * from  patient;");
                                $Hospitalrow = $con->query("SELECT  * from  hospital;");
                                $appointmentrow = $con->query("SELECT  * from  appointment where a_date>='$today';");
                                $schedulerow = $con->query("SELECT  * from  schedule where sch_date='$today';");


                                ?>
                                       
                                      
            <div class="page-wrapper">
                <div class="content">
                <div class="sear">
                <div class="ch" id="h3">
                    <h2 >Status</h2>

                            </div>
                    
                            </div>  

                    <div class="row">

                    
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                                    <div class="dash-widget">
                                <span class="dash-widget-bg1"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                                <div class="dash-widget-info text-right">
                                    <h3>

                                <?php    echo $Hospitalrow->num_rows  ?>

                                    </h3>
                                    <span class="widget-title1">Hospital <i class="fa fa-check" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                            <div class="dash-widget">
                                <span class="dash-widget-bg2"><i class="fa fa-wheelchair"></i></span>
                                <div class="dash-widget-info text-right">
                                    <h3>
                                <?php    echo $patientrow->num_rows  ?>

                                    </h3>
                                    
                                    <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                            <div class="dash-widget">
                                <span class="dash-widget-bg3"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                <div class="dash-widget-info text-right">
                                    <h3>

                                <?php    echo $appointmentrow ->num_rows  ?>

                                    </h3>
                                    <span class="widget-title3">New Bookings<i class="fa fa-check" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                            <div class="dash-widget">
                                <span class="dash-widget-bg4"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>
                                <div class="dash-widget-info text-right">
                                    <h3>

                                    <?php    echo $schedulerow ->num_rows  ?>

                                    </h3>
                                    <span class="widget-title4">Today Sessions <i class="fa fa-check" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="filter-container Hospital-header" style="border: none;width:95%" border="0" >
                    <tr>
                        <td >
                            <h3>Welcome!</h3>
                            <h1><?php echo $username  ?></h1>
                            <p>Thanks for joinnig with us. We are always trying to get you a complete service<br>
                            You can view your dailly schedule, Reach Patients Appointment at home!<br><br>
                            </p>
                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Hospitals Schedule" list="patient">&nbsp;&nbsp;
                           <a href="schedule.php"><input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;width:"></a> 
                            
                            <br>
                            <br>
                        </td>
                    </tr>
                    </table>
                  
                    <?php
                        $sqlmain= "SELECT appointment.a_id,schedule.sch_id,schedule.title,hospital.h_name,patient.p_name,schedule.sch_date,schedule.sch_time,appointment.a_No,appointment.a_date from schedule inner join appointment on schedule.sch_id=appointment.sch_id inner join patient on patient.p_id=appointment.p_id inner join hospital on schedule.h_id=hospital.h_id";
                        $result= $con->query($sqlmain);
                        $row=$result->fetch_assoc();

                        $appoid=$row["a_id"];
                        $scheduleid=$row["sch_id"];
                        $title=$row["title"];
                        $hospname=$row["h_name"];
                        $scheduledate=$row["sch_date"];
                        $scheduletime=$row["sch_time"];
                        $pname=$row["p_name"];
                        $apponum=$row["a_id"];
                        $appodate=$row["a_date"];
                         $appstatus = get_status($con,$appoid);

?>

                    <div class="row" id="t1" >
                        <div class="col-12 col-md-6 col-lg-8 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title d-inline-block">Your Upcoming Bookings until Next 
                                    <?php  
                                        echo date("l",strtotime("+1 week"));
                                        ?>
                                    </h4> <a href="schedule.php" class="btn btn-primary float-right">View all</a>
                                </div>


                                <?php
                        $sqlmain= "SELECT schedule.sch_id,schedule.title,hospital.h_name,schedule.sch_date,schedule.sch_time,schedule.No_p from schedule inner join hospital on schedule.h_id=hospital.h_id;";
                        $result= $con->query($sqlmain);
                      
                        // $row=$result->fetch_assoc($sqlmain);

                        $schid=$row["sch_id"];
                        $title=$row["title"];
                        $hname=$row["h_name"];
                        $date=$row["sch_date"];
                        $time=$row["sch_time"];
                       



?>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table new-patient-table">
                                            <tbody>
                                            <th>Appointment Number</th>

                                            <th>Session Title</th>
                                            <th>Hospital</th>

                                            <th>Date</th>
                                            <th>Time</th>
                                                <tr>
                                                    <td>
                                                        <h2>
<?php
echo $schid;
?>


                                                        </h2>
                                                    </td>
                                                    <td>

                                                    <?php
echo $title;
?>

                                                    </td>
                                                    <td>
                                                    <?php
echo $hname;
?>


                                                    </td>
                                                    <td>


                                                    <?php
echo $date;
?>
                                                    </td>
                                                    <td>


<?php
echo $time;
?>
</td>
                                                </tr>
                                                <tr>
                                                  
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
			

                </div>
            </div>
        </div>
    </div>
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