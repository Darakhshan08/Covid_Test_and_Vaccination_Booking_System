<?php

//import database
include("../connection.php");

//learn from w3schools.com

session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['user_type']!='a'){
        header("location: ../login.php");
    }

}else{
    header("location: ../login.php");
}


?>

<!DOCTYPE html>
<html lang="en">



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
    .input-text{
    width:400px;
    height:45px;
    border: 1px solid black;

}
.header-search{
    margin-left:300px;
    margin-bottom:40px;
}
#t1{
    width:1350px;
    margin-top:20px;

}
#date{
    height:33px;
    border: 1px solid black;

}

.overlay{
    margin-top:190px;
    margin-left:400px;

}
.label-td{
    font-size:17px;
}
.gg {
    width:1000px;
    margin-left:20px;

}
.login-btn{
    margin-top:70px;
    margin-left:1000px;

}
</style>
<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index.html" class="logo">
                <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>COVID-19</span>
				
				</a>
			</div>
			<!-- <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a> -->
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">

                </li>
                <!-- <li class="nav-item dropdown d-none d-sm-block">
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
                </li> -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span> </span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
						<a class="dropdown-item" href="login1.php">Logout</a>
					</div>
                </li>
            </ul>
          
       
            
            <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="index-2.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="hospitals.php"><i class="fa fa-hospital-o"></i> <span>Hospitals</span></a>
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
								<li><a href="leaves.php">Leaves</a></li>
								
							</ul>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Schedule</span></a>
                        </li>
                        <li>
                            <a href="vaccine.php"><i class="fa fa-hospital-o"></i> <span>Vaccine</span></a>
                        </li>
						
                        
						
						<li class="submenu">
							<a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="expense-reports.php"> Expense Report </a></li>
								<li><a href="invoice-reports.php"> Invoice Report </a></li>
							</ul>
						</li>

                        <li>
                            <a href="settings.php"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
                        
                        
                        <li>
                            <a href="calendar.php"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                        </li>
                 
                       
                    </ul>
                </div>
            </div>
        </div>
        </div>
            </div>
        </div>
         
                <?php
                
                if($_GET){
                    $id=$_GET["id"];


                $sqlmain= "select schedule.sch_id,schedule.title,hospital.h_name,schedule.sch_date,schedule.sch_time,schedule.No_p from schedule inner join hospital on schedule.h_id=hospital.h_id where schedule.sch_id=$id";
                $result= $con->query($sqlmain);
                $row=$result->fetch_assoc();
                $hospname=$row["h_name"];
                $scheduleid=$row["sch_id"];
                $title=$row["title"];
                $scheduledate=$row["sch_date"];
                $scheduletime=$row["sch_time"];
                
               
                $nop=$row['No_p'];
    
    
                $sqlmain12= "select * from appointment inner join patient on patient.p_id=appointment.p_id inner join schedule on schedule.sch_id=appointment.sch_id where schedule.sch_id=$id;";
                $result12= $con->query($sqlmain12);
                echo '
                <div id="popup1" class="overlay">
                        <div class="popup" style="width: 70%;">
                        <center>
                            <h2></h2>
                            <div class="content">
                                
                                
                            </div>
                            <div class="abc scroll" style="display: flex;justify-content: center;">
                            <table width="80%" class="sub-table scrolldown add-hosp-form-container" border="0">
                            
                                <tr>
                                    <td>
                                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
                                    </td>
                                </tr>
                                
                                <tr>
                                    
                                    <td class="label-td" colspan="2">
                                        <label for="name" class="form-label">Session Title: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        '.$title.'<br><br>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="Email" class="form-label">Hospital of this session: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                    '.$hospname.'<br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="nic" class="form-label">Scheduled Date: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                    '.$scheduledate.'<br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="Tele" class="form-label">Scheduled Time: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                    '.$scheduletime.'<br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="spec" class="form-label"><b>Patients that Already registerd for this session:</b> ('.$result12->num_rows."/".$nop.')</label>
                                        <br><br>
                                    </td>
                                </tr>
                             
                                
                                <tr>
                                <td colspan="4">
                                    <center>
                                     <div class="abc scroll">
                                     <table width="100%" class="sub-table scrolldown" border="0">
                                     <thead>
                                     <tr>   
                                            <th class="table-headin">
                                                 Patient ID
                                             </th>
                                             <th class="table-headin">
                                                 Patient name
                                             </th>
                                             <th class="table-headin">
                                                 
                                                 Appointment number
                                                 
                                             </th>
                                            
                                             
                                             <th class="table-headin">
                                                 Patient Telephone
                                             </th>
                                             
                                     </thead>
                                     <tbody>';
                }
                    
                    
                                             
                                             $result= $con->query($sqlmain12);
                    
                                             if($result->num_rows==0){
                                                 echo '<tr>
                                                 <td colspan="7">
                                                 <br><br><br><br>
                                                 <center>
                                                 <img src="../img/notfound.svg" width="25%">
                                                 
                                                 <br>
                                                 <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                                 <a class="non-style-link" href="appointment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                                 </a>
                                                 </center>
                                                 <br><br><br><br>
                                                 </td>
                                                 </tr>';
                                                 
                                             }
                                             else{
                                             for ( $x=0; $x<$result->num_rows;$x++){
                                                 $row=$result->fetch_assoc();
                                                 $apponum=$row["a_NO"];
                                                 $pid=$row["p_id"];
                                                 $pname=$row["p_name"];
                                                 $ptel=$row["p_contect"];
                                                 
                                                 echo '
                                                 <div class="gg">
                                                 <tr style="">
                                                    <td>
                                                    '.substr($pid,0,15).'
                                                    </td>
                                                     <td style="font-weight:600;padding:25px">'.
                                                     
                                                     substr($pname,0,25)
                                                     .'</td >
                                                     <td style="font-size:23px;font-weight:500; color: var(--btnnicetext);">
                                                     '.$apponum.'
                                                     
                                                     </td>
                                                     <td>
                                                     '.substr($ptel,0,25).'
                                                     </td>
                                                     
                                                     </div>
                    
                                                     
                                                 </tr>';
                                                 
                                             }
                                         }
                                              
                                         
                    
                                        echo '</tbody>
                    
                                     </table>
                                     </div>
                                     </center>
                                </td> 
                             </tr>
    
                            </table>
                            </div>
                        </center>
                        <br><br>
                </div>
                <a class="non-style-link" href="appointments.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                

                </div>
                ';  
        
    
     
        
    
            
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



</html>