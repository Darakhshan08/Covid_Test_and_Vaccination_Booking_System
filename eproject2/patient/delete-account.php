<?php

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

    
    if($_GET){
        //import database
        include("../connection.php");
        $id=$_GET["id"];
        $result001= $con->query("SELECT * from patient where p_id=$id;");
        $email=($result001->fetch_assoc())["p_email"];
        $sql= $con->query("DELETE from web_user where email='$email';");
        $sql= $con->query("DELETE from patient where p_email='$email';");
        //print_r($email);
        header("location: ../logout.php");
    }


?>