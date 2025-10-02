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
    <script>
        feather.replace()
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<style>
    .input-text {
        width: 400px;
        height: 45px;
        border: 1px solid black;

    }

    .header-search {
        margin-left: 300px;
        margin-bottom: 40px;
    }

    #t1 {
        /* width: 1350px; */
        margin-top: 20px;

    }

    #date {
        height: 33px;
        border: 1px solid black;

    }
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
						<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
						<a class="dropdown-item" href="login.html">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
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
        </div>      <?php
                            date_default_timezone_set('Asia/Karachi');
                            $today = date('d-m-Y');
                            // echo $today;
                            ?>   <?php

$sqlmain= "SELECT * from schedule inner join hospital on schedule.h_id=hospital.h_id where schedule.sch_date>='$today'  order by schedule.sch_date asc";
$sqlpt1="";
$insertkey="";
$q='';
$searchtype="All";
        if($_POST){
        //print_r($_POST);
        
        if(!empty($_POST["search"])){
            
            $keyword=$_POST["search"];
            $sqlmain= "SELECT * from schedule inner join hospital on schedule.h_id=hospital.h_id where schedule.sch_date>='$today' and (hospital.h_name='$keyword' or hospital.h_name like '$keyword%' or hospital.h_name like '%$keyword' or hospital.h_name like '%$keyword%' or schedule.title='$keyword' or schedule.title like '$keyword%' or schedule.title like '%$keyword' or schedule.title like '%$keyword%' or schedule.sch_date like '$keyword%' or schedule.sch_date like '%$keyword' or schedule.sch_date like '%$keyword%' or schedule.sch_date='$keyword' )  order by schedule.sch_date asc";
            //echo $sqlmain;
            $insertkey=$keyword;
            $searchtype="Search Result : ";
            $q='"';
        }

    }


$result= $con->query($sqlmain)


?> 



            <div class="page-wrapper">
                <div class="content">
                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;    width: 100%;display: flex;justify-content: end;    font-weight: 700;font-size: 16px;">
                            <!-- Today's Date :  -->

                        
                        </p>
                  

                    <div class="row">

                        <div class="col-sm-4 col-3">
                            <?php

                            $list110 = $con->query("SELECT  * from  schedule;");


                            ?>

                            <h4 class="page-title">All Sessions (<?php echo $result->num_rows?>)</h4>
                        </div>
          

                  






                  


            

                        <form id="this_id" class="mb-3 mt-4" style="width: 88%;"  action="" method="post">
                       

                            <h4 style="    margin-bottom: 0px;"><b>Hospital:</b></h4>

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Hospital name or Email or Date (YYYY-MM-DD)" list="Hospitals" value="<?php  echo $insertkey ?>">


                            <button type="submit" name="filter" style="    width: 127px;" class="btn btn-primary of_this"><i class="text-white fa-fa" data-feather="search"></i>Filtre</button>

                        </form>

                        <div class="row" style="    width: 100%;">
                            <div class="col-md-12">
                                <div class="table-responsive">

                      



                                </div>



                                <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="100%" class="sub-table scrolldown" border="0" style="padding: 50px;border:none">
                            
                        <tbody>




                                            <?php

                                            if ($_GET) {

                                                $id = $_GET["id"];
                                                $action = $_GET["action"];
                                                $sqlmain = "SELECT * from schedule where sch_id='$id'";
                                                $result = $con->query($sqlmain);
                                                $row = $result->fetch_assoc();
                                                $title = $row["title"];
                                                $hname = $row["h_name"];
                                                $date = $row["sch_date"];
                                                $time = $row["sch_time"];
                                                $nop = $row["No_p"];}
                      ?>



                                    <?php

                                    
                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Sessions &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                    //echo $result->num_rows;
                                for ( $x=0; $x<($result->num_rows);$x++){
                                    echo "<tr>";
                                    for($q=0;$q<3;$q++){
                                        $row=$result->fetch_assoc();
                                        if (!isset($row)){
                                            break;
                                        };
                                        $scheduleid=$row["sch_id"];
                                        $title=$row["title"];
                                        $hospname=$row["h_name"];
                                        $scheduledate=$row["sch_date"];
                                        $scheduletime=$row["sch_time"];

                                        if($scheduleid==""){
                                            break;
                                        }

                                        echo '
                                        <td style="width: 25%;">
                                                <div  class="dashboard-items search-items"  >
                                                
                                                    <div style="width:100%">
                                                            <div class="h1-search">
                                                                '.substr($title,0,21).'
                                                            </div><br>
                                                            <div class="h3-search">
                                                                '.substr($hospname,0,30).'
                                                            </div>
                                                            <div class="h4-search">
                                                                Available Date: '.($scheduledate).'<br>Available Time: <b>'.substr($scheduletime,0,5).'</b> 
                                                            </div>
                                                            <br>
                                                            <a href="booking.php?id='.$scheduleid.'" ><button  class="login-btn btn-primary-soft btn "  style="padding-top:11px;padding-bottom:11px;width:100%"><font class="tn-in-text">Book Now</font></button></a>
                                                    </div>
                                                            
                                                </div>
                                            </td>';

                                    }
                                    echo "</tr>";
                                }}


?>
                                    <!-- </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

<!-- 

        </div>
    </div>
    </div> -->


    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        feather.replace()
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
</body>



</html>