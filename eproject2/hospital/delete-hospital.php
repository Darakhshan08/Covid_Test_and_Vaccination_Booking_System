<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['user_type']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_GET){
        //import database
        include("../connection.php");
        $id=$_GET["id"];
        $result001= $con->query("select * from hospital where hospid=$id;");
        $email=($result001->fetch_assoc())["h_email"];
        $sql= $con->query("delete from webu_ser where email='$email';");
        $sql= $con->query("delete from hospital where h_email='$email';");
        //print_r($email);
        header("location: Hospitals.php");
    }


?>