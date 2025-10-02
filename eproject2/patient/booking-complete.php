<?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['user_type']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");
    $userrow = $con->query("SELECT * from patient where p_email='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["p_id"];
    $username=$userfetch["p_name"];


    if($_POST){
        if(isset($_POST["booknow"])){
            $apponum=$_POST["apponum"];
            $scheduleid=$_POST["scheduleid"];
            $date=$_POST["date"];
            $scheduleid=$_POST["scheduleid"];
            $sql2="INSERT into appointment(p_id,a_NO,sch_id,a_date) values ($userid,$apponum,$scheduleid,'$date')";
            $result= $con->query($sql2);
            //echo $apponom;
            header("location: appointments.php?action=booking-added&id=".$apponum."&titleget=none");

        }
    }
 ?>