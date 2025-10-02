<?php

include('../connection.php');
function get_status($database,$no){
    $query = "SELECT * FROM appointment where a_id = $no";
    $run = mysqli_query($database,$query);
    $status = mysqli_fetch_assoc($run);
    return $status['status'];
}
session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['user_type']!='a'){
        header("location: ../login.php");
    }else{
        $useremail=$_SESSION["user"];
    }
}

 else{
    header("location: ../login.php");
}
$userrow = $con->query("SELECT * from admin where a_email='$useremail'");
$userfetch=$userrow->fetch_assoc();
$userid= $userfetch["a_id"];
$username=$userfetch["a_name"];
$uemail=$userfetch["a_email"];


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
						<span><?php echo $username  ?></span>
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
                <h4>   <span class="" id="Icon"><i class="fa fa-user-o" id=""></i>&nbsp;&nbsp;&nbsp;&nbsp;</span>ADMINSTRATOR</h4> 

                        </li>

                        <li class="active">
                            <a href="index-2.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-hospital-o"></i>  <span>Hospitals</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
								<li><a href="hospitals.php">View</a></li>
								
							</ul>
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
                            <a href="vaccine.php"><i class="fa fa-hospital-o"></i> <span>Vaccine</span></a>
                        </li>
						
                        
						
				
						</li>

                        <li>
                            <a href="settings.php"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
                        
                     
                 
                       
                    </ul>
                </div>
            </div>
        </div>
            <div class="page-wrapper">
                <div class="content">
                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;    width: 100%;display: flex;justify-content: end;    font-weight: 700;font-size: 16px;">
                            Today's Date : 

                            <?php
                            date_default_timezone_set('Asia/Karachi');
                            $today = date('d-m-Y');
                            // echo $today;
                            ?>
                        </p>
                    <div class="col-md-12 mt-5 mb-4" style="display: flex;     justify-content: center;">
                        <h2> Session Manager</h2>
                    </div>

                    <div class="row">

                        <div class="col-sm-4 col-3">
                            <?php

                            $list110 = $con->query("select  * from  schedule;");


                            ?>

                            <h4 class="page-title">All Sessions (<?php echo $list110->num_rows; ?>)</h4>
                        </div>
          

                        <div class="col-sm-8 col-9 text-right m-b-20">
                            <a href="add-session.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Session</a>
                        </div>








            

                        <form id="this_id" class="mb-3 mt-4" style="width: 88%;"  action="" method="post">
                        <h4 style="    margin-bottom: 0px;"> <b> Date:</b></h4>

                            <div class="input_div">
                            <input type="date" name="sheduledate" id="date" class="input-text  hv  filter-container-items" style="margin: 0;width: 95%; border-radius:5px;text-align: center;">
                            </div>

                            <h4 style="    margin-bottom: 0px;"><b>Hospital:</b></h4>

                            <select name="hospid" id="" class="box filter-container-items hv" style="width:36% ;height: 37px;margin: 0;  border-radius: 5px;">
                                <option value="" disabled selected hidden>Choose Hospital Name from the list</option><br />

                                <?php

                                $list11 = $con->query("SELECT  * from  hospital order by h_name asc;");

                                for ($y = 0; $y < $list11->num_rows; $y++) {
                                    $row00 = $list11->fetch_assoc();
                                    $sn = $row00["h_name"];
                                    $id00 = $row00["h_id"];
                                    echo "<option value=" . $id00 . ">$sn</option><br/>";
                                };


                                ?>

                            </select>

                            <button type="submit" name="filter" style="    width: 127px;" class="btn btn-primary of_this"><i class="text-white fa-fa" data-feather="search"></i>Filtre</button>

                        </form>

                        <div class="row" style="    width: 100%;">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <?php

                                    if ($_POST) {

                                        //print_r($_POST);
                                        $sqlpt1 = "";
                                        if (!empty($_POST["sheduledate"])) {
                                            $sheduledate = $_POST["sheduledate"];
                                            $sqlpt1 = " schedule.sch_date='$sheduledate' ";
                                        }


                                        $sqlpt2 = "";
                                        if (!empty($_POST["hospid"])) {
                                            $hospid = $_POST["hospid"];
                                            $sqlpt2 = " hospital.h_id=$hospid ";
                                        }
                                        //echo $sqlpt2;
                                        //echo $sqlpt1;
                                        $sqlmain = "SELECT schedule.sch_id,schedule.title,hospital.h_name,schedule.sch_date,schedule.sch_time,schedule.No_p from schedule inner join hospital on schedule.h_id=hospital.h_id";
                                        $sqllist = array($sqlpt1, $sqlpt2);
                                        $sqlkeywords = array(" where ", " and ");
                                        $key2 = 0;
                                        foreach ($sqllist as $key) {

                                            if (!empty($key)) {
                                                $sqlmain .= $sqlkeywords[$key2] . $key;
                                                $key2++;
                                            };
                                        };
                                        //echo $sqlmain;



                                        //
                                    } else {
                                        $sqlmain = "SELECT schedule.sch_id,schedule.title,hospital.h_name,schedule.sch_date,schedule.sch_time,schedule.No_p from schedule inner join hospital on schedule.h_id=hospital.h_id order by schedule.sch_date desc";
                                    }



                                    ?>




                                </div>



                                <div class="row">
                                    <div class="col-md-12" style="    padding-right: 5px !important; ">
                                        <div class="table-responsive">




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
                                                $nop = $row["No_p"];
                                                echo '
        <div id="popup1" class="overlay">
                <div class="popup">
                <center>
                    <a class="close" href="patient.php">&times;</a>
                    <div class="content">

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
                                <label for="name" class="form-label">Patient ID: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                P-' . $id . '<br><br>
                            </td>
                            
                        </tr>
                        
                        <tr>
                            
                            <td class="label-td" colspan="2">
                                <label for="name" class="form-label">Name: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                ' . $title . '<br><br>
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="Email" class="form-label">Email: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                            ' . $hname . '<br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="nic" class="form-label">NIC: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                            ' . $date . '<br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="Tele" class="form-label">Telephone: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                            ' . $time . '<br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="spec" class="form-label">Address: </label>
                                
                            </td>
                        </tr>
                        <tr>
                        <td class="label-td" colspan="2">
                        ' . $nop . '<br><br>
                        </td>
                        </tr>
                        <tr>
                            
                            <td class="label-td" colspan="2">
                                <label for="name" class="form-label">Date of Birth: </label>
                            </td>
                        </tr>
                      
                        <tr>
                            <td colspan="2">
                                <a href="patient.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                            
                                
                            </td>
            
                        </tr>
                       

                    </table>
                    </div>
                </center>
                <br><br>
        </div>
        </div>
        ';
                                            };

                                            ?>
                                        </div>


                                        <?php


                                        $result = $con->query($sqlmain);

                                        if ($result->num_rows == 0) {
                                            echo '<tr>
    <td colspan="4">
    <br><br><br><br>
    <center>
    <img src="./assets/img/n.png" width="11%">
    
    <br>
    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
    <a class="non-style-link" href="patient.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Patients &nbsp;</font></button>
    </a>
    </center>
    <br><br><br><br>
    </td>
    </tr>';
                                        } else {




                                            echo '	<table class="table table-border table-striped custom-table datatable mb-0" id="t1">
    <thead>
        <tr>
            

            <th>Session Title</th>
            <th>Hospital</th>
            <th>Schedule Date</th>
            <th>Schedule time</th>
            <th>Max Num </th>
            <th>Action</th>
        </tr>
    </thead>';


                                            // SELECT schedule.sch_id,schedule.title,hospital.h_name,schedule.sch_date,schedule.sch_time,schedule.No_p from schedule inner join hospital on schedule.h_id=hospital.h_id where schedule.sch_id;

                                            for ($x = 0; $x < $result->num_rows; $x++) {

                                                $row = $result->fetch_assoc();

                                                $schid = $row["sch_id"];
                                                $title = $row["title"];
                                                $hname = $row["h_name"];
                                                $date = $row["sch_date"];
                                                $time = $row["sch_time"];
                                                $nop = $row["No_p"];


                                                echo '
       <tr>
        <td> &nbsp;' .
                                                    substr($title, 0, 35)
                                                    . '</td>
        <td>
        ' . substr($hname, 0, 20) . '
         </td>
        <td>
            ' . substr($date, 0, 10) . '
        </td>
       
         <td>
        ' . substr($time, 0, 12) . '
        </td>
        <td>
        ' . substr($nop, 0, 10) . '
        </td>
      
       
        <td>
        <div class="dropdown dropdown-action">
        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" id="u2"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="view-schedule.php ?id=' . $row['sch_id'] . '"><i class="fa fa-pencil m-r-5"></i> view</a>
            <a class="dropdown-item" href="schedule-delete.php ?id=' . $row['sch_id'] . '"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            
        </div>
    </div>
</td>
<div style="display:flex;justify-content: center;">


</div>
        </td>

     

    </tr>
    ';
                                            }
                                        }

                                        ?>
                                    </div>
                                </div>
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
    <script>
        feather.replace()
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
</body>



</html>