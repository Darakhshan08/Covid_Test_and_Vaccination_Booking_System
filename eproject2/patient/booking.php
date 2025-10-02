
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
.dash-body{
    position: absolute;
    top:20%;
    left:-5%;
    width:1500px;

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



        <div class="dash-body">

            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                  

                    <?php
                            date_default_timezone_set('Asia/Karachi');
                            $today = date('d-m-Y');
                            // echo $today;
                            ?> 
                                       
                    <td>
       
                    <?php
                            
                            if(($_GET)){
                                
                                
                                if(isset($_GET["id"])){
                                    

                                    $id=$_GET["id"];

                                    $sqlmain= "SELECT * from schedule inner join hospital on schedule.h_id=hospital.h_id where schedule.sch_id=$id  order by schedule.sch_date desc";

                                    //echo $sqlmain;
                                    $result= $con->query($sqlmain);
                                    $row=$result->fetch_assoc();
                                    $scheduleid=$row["sch_id"];
                                    $title=$row["title"];
                                    $hospname=$row["h_name"];
                                    $hospemail=$row["h_email"];
                                    $scheduledate=$row["sch_date"];
                                    $scheduletime=$row["sch_time"];
                                    $sql2="SELECT * from appointment where sch_id=$id";
                                    //echo $sql2;
                                     $result12= $con->query($sql2);
                                     $apponum=($result12->num_rows)+1;
                                    
                                    echo '
                                        <form action="booking-complete.php" method="post">
                                            <input type="hidden" name="scheduleid" value="'.$scheduleid.'" >
                                            <input type="hidden" name="apponum" value="'.$apponum.'" >
                                            <input type="hidden" name="date" value="'.$today.'" >

                                        
                                    
                                    ';
                                     

                                    echo '
                                    <td style="width: 50%;" rowspan="2">
                                            <div  class="dashboard-items search-items"  >
                                            
                                                <div style="width:100%">
                                                        <div class="h1-search" style="font-size:25px;">
                                                            Session Details
                                                        </div><br><br>
                                                        <div class="h3-search" style="font-size:18px;line-height:30px">
                                                            Hospital name:  &nbsp;&nbsp;<b>'.$hospname.'</b><br>
                                                            Hospital Email:  &nbsp;&nbsp;<b>'.$hospemail.'</b> 
                                                        </div>
                                                        <div class="h3-search" style="font-size:18px;">
                                                          
                                                        </div><br>
                                                        <div class="h3-search" style="font-size:18px;">
                                                            Session Title: '.$title.'<br>
                                                            Session Scheduled Date: '.$scheduledate.'<br>
                                                            Session Starts : '.$scheduletime.'<br>
                                                            Channeling fee : <b>RS.5000</b>

                                                        </div>
                                                        <br>
                                                        
                                                </div>
                                                        
                                            </div>
                                        </td>
                                     
                                        
                                        
                                        <td style="width: 25%;">
                                            <div  class="dashboard-items search-items"  >
                                            
                                                <div style="width:100%;padding-top: 15px;padding-bottom: 15px;">
                                                        <div class="h1-search" style="font-size:20px;line-height: 35px;margin-left:8px;text-align:center;">
                                                            Your Appointment Number
                                                        </div>
                                                        <center>
                                                        <div class=" dashboard-icons" style="margin-left: 0px;width:90%;font-size:70px;font-weight:800;text-align:center;color:var(--btnnictext);background-color: var(--btnice)">'.$apponum.'</div>
                                                    </center>
                                                       
                                                        </div><br>

                                                        
                                                        <br>
                                                        <br>
                                                </div>
                                            <input type="Submit" class="login-btn btn-primary btn btn-book" style="margin-left:10px;padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;width:95%;text-align: center;" value="Book now" name="booknow"></button>
                                                        
                                            </div>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
     
                                           
                                            </form>
                                            </td>
                                        </tr>
                                        '; 
                                        




                                }



                            }
                            
                            ?>
                              </tbody>

</table>
</div>
</center>
</td> 
</tr>
                   
                       
                        
                        
            </table>
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