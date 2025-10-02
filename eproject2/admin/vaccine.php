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
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<style>
    /* .input-text{
    width:400px;
    height:45px;
    border: 1px solid black;

} */
    /* .header-search{
    margin-left:300px;
    margin-bottom:40px;
} */
    #t1 {
        /* width: 1350px; */
        margin-top: 20px;

    }

    .t2 {
        margin-right: 20px;
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

                    <div class="col-md-12 mt-2 mb-4" style="display: flex;     justify-content: center;">
                        <h2> Vaccines </h2>
                    </div>

                    <div class="row" >

                        <div class="col-sm-4 col-3">
                            <?php

                            $list110 = $con->query("select  * from  vaccine;");


                            ?>

                            <h4 class="page-title">All Vaccines (<?php echo $list110->num_rows; ?>)</h4>
                        </div>


                        <div class="col-sm-8 col-9 text-right m-b-20">
                        </div>

              

                    

                                                <form id="this_id" class="mb-3 mt-4" style="width: 88%;" method="POST">

                                        
                                                        <h4><b>Hospital:</b></h4>
                                              
                                                        <select name="hospid" id="" class="box filter-container-items" style="width:90% ;height: 37px;margin: 0;">
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
                                               
                                                        <input type="submit" name="filter" value=" Filter" style="    width: 127px;" class="btn btn-primary of_this">


                                                </form>
                             




                        <div class="row" style="    width: 100%;">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <?php

                                    if ($_POST) {



                                        $sqlpt1 = "";
                                        if (!empty($_POST["hospid"])) {
                                            $hospid = $_POST["hospid"];
                                            $sqlpt1 = " hospital.h_id=$hospid ";
                                        }
                                        //echo $sqlpt2;
                                        //echo $sqlpt1;
                                        $sqlmain = "SELECT vaccine.vaccine_id,vaccine.title,hospital.h_name,vaccine.No_p from vaccine inner join hospital on vaccine.h_id=hospital.h_id";
                                        $sqllist = array($sqlpt1);
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
                                        $sqlmain = "SELECT vaccine.vaccine_id,vaccine.title,hospital.h_name,vaccine.No_p from vaccine inner join hospital on vaccine.h_id=hospital.h_id order by vaccine.vaccine_id desc";
                                    }



                                    ?>




                                </div>



                                <div class="row">
                                    <div class="col-md-12">
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
            

            <th>Vaccine Name</th>
            <th>Hospital</th>
            <th>Avaible Vaccines</th>
            <th>Action</th>
        </tr>
    </thead>';


                                            // SELECT schedule.sch_id,schedule.title,hospital.h_name,schedule.sch_date,schedule.sch_time,schedule.No_p from schedule inner join hospital on schedule.h_id=hospital.h_id where schedule.sch_id;

                                            for ($x = 0; $x < $result->num_rows; $x++) {

                                                $row = $result->fetch_assoc();

                                                $schid = $row["vaccine_id"];
                                                $title = $row["title"];
                                                $hname = $row["h_name"];
                                                $nop = $row["No_p"];


                                                echo '
       <tr>
        <td> &nbsp;' .
                                                    substr($title, 0, 35)
                                                    . '</td>
        <td>
        ' . substr($hname, 0, 20) . '
         </td>
         <td id="t3">
         ' . substr($nop, 0, 20) . '

         </td>
        
      
       
        <td>
        <div class="dropdown dropdown-action">
        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" id="u2"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="vaccine-delete.php ?id=' . $row['vaccine_id'] . '><i class="fa fa-trash-o m-r-5"></i> Removee</a>
            
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