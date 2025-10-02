<?php

//import database
include("../connection.php");

//learn from w3schools.com

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


<!-- patients23:17-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script>
        feather.replace()
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<style>

.LG{
    border: 1px solid black;

}
.input-text{
    width:700px;
    height:45px;
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
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h3 class="page-title">Hospital</h3>
                    </div>
          
                            
                       
                      
                 
                  

                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-hospital.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Hospital</a>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                    


                        
                   <?php    $con = mysqli_connect("localhost","root","","covid");


if($_GET){
    
    $id=$_GET["id"];
    $action=$_GET["action"];
        $sqlmain= "SELECT * from hospital where h_id='$id'";
        $result= $con->query($sqlmain);
        $row=$result->fetch_assoc();
        $name=$row["h_name"];
        $email=$row["h_email"];
        $nic=$row["h_nic"];
        $tele=$row["h_contect"];

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
                                P-'.$id.'<br><br>
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
                            <td class="label-td" colspan="2">
                                <label for="spec" class="form-label">Address: </label>
                                
                            </td>
                        </tr>
                        <tr>
                        <td class="label-td" colspan="2">
                        '.$address.'<br><br>
                        </td>
                        </tr>
                        <tr>
                            
                            <td class="label-td" colspan="2">
                                <label for="name" class="form-label">Date of Birth: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                '.$tele.'<br><br>
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
          <table>
                    <td>
                        
                        <form action="" method="post" class="header-search mb-4 mt-2">

                            <input type="search" name="search" style="border-radius: 7px;" class="input-text hv header-searchbar"  placeholder="  Search hospital name or Email" list="patient">&nbsp;&nbsp;
                            
                            <?php
                                echo '<datalist id="patient">';

                                $list11 = $con->query("SELECT h_name,h_email from hospital;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["h_name"];
                                    $c=$row00["h_email"];
                                    echo "<option value='$d'><br/>";
                                    echo "<option value='$c'><br/>";
                                };

                            echo ' </datalist>;
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px; ">
                        
                            </form>
                            
                        ';
?>
</td>
</table>    <div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
					
    <?php
                        if($_POST){
                            $keyword=$_POST["search"];
                            
                            $sqlmain= "SELECT * from hospital where h_email='$keyword' or h_name='$keyword' or h_name like '$keyword%' or h_name like '%$keyword' or h_name like '%$keyword%' ";
                        }else{
                            $sqlmain ="SELECT * from hospital order by h_id desc";
                            

                        }



                    ?>  
                    
                    <?php
    
                                
$result= $con->query($sqlmain);

if($result->num_rows==0){
    echo '<tr>
    <td colspan="4">
    <br><br><br><br>
    <center>
    <img src="./assets/img/n.png" width="11%">
    
    <br>
    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
    <a class="non-style-link" href="hospital.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Hospitals &nbsp;</font></button>
    </a>
    </center>
    <br><br><br><br>
    </td>
    </tr>';
    
}
else{


    echo '	<table class="table table-border table-striped custom-table datatable mb-0">
    <thead>
        <tr>
            

            <th>Name</th>
            <th>Email</th>
            <th>NIC</th>
             <th>Contact</th>
            <th>Action</th>
        </tr>
    </thead>'; 
        
for ( $x=0; $x<$result->num_rows;$x++){
    $row=$result->fetch_assoc();
    $pid=$row["h_id"];
    $name=$row["h_name"];
    $email=$row["h_email"];    
    $nic=$row["h_nic"];
    $tel=$row["h_contect"];
  
    echo '
       <tr>
        <td> &nbsp;'.
        substr($name,0,35)
        .'</td>
        <td>
        '.substr($email,0,20).'
         </td>

         <td>
        '.substr($nic,0,12).'
        </td>
        <td>
        '.substr($tel,0,10).'
        </td>
        <td> 
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-hospital.php ?id='. $row['h_id'].'"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="delete-hospital.php ?id='. $row['h_id'].'" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    
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
 
?></div></div></div>  </div>
                    </div>
                </div>
            </div>
            

            <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item new-message">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">John Doe</span>
                                            <span class="message-time">1 Aug</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Tarah Shropshire </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Mike Litorus</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Catherine Manseau </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">D</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Domenic Houston </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">B</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Buster Wigton </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Rolland Webber </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Claire Mapes </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Melita Faucher</span>  
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Jeffery Lalor</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Loren Gatlin</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Tarah Shropshire</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="chat.php">See all messages</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="delete_patient" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/img/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure want to delete this Patient?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
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
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- patients23:19-->
</html>