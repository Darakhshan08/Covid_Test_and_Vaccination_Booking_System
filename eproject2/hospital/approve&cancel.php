<?php
require '../connection.php';
if(!isset($_GET['app_id']) || !isset($_GET['purpose'])){
    header('location:index.php');
}
$id = $_GET['app_id'];
$purpose = $_GET['purpose'];
if($purpose == 0){
    $query = "UPDATE `appointment` SET status='Your Appointment Has been Cancelled' WHERE a_id = $id";
    $run = mysqli_query($con,$query);
    if($run){
        header('location:appointments.php');
    }
    else{
        header('location:appointments.php');

    }
}
if($purpose == 1){
    $query = "UPDATE `appointment` SET status='Approved' WHERE a_id = $id";
    $run = mysqli_query($con,$query);
    if($run){
        header('location:appointments.php');
    }
    else{
        header('location:appointments.php');

    }
}
















?>