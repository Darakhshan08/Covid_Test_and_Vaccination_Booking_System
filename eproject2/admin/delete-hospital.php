<?php

$con=mysqli_connect('localhost','root','','covid');
if(isset($_GET['id'])){
$id=$_GET['id'];

$sql="DELETE FROM `hospital` WHERE `h_id`=$id";

$res=mysqli_query($con,$sql);
if($res){
 header("location:hospitals.php");
}
}else{
 echo "error";
}

?>