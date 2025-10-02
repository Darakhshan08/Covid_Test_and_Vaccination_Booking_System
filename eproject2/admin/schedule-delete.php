<?php

$con=mysqli_connect('localhost','root','','covid');
if(isset($_GET['id'])){
$id=$_GET['id'];

$sql="DELETE FROM `schedule` WHERE `sch_id`=$id";

$res=mysqli_query($con,$sql);
if($res){
 header("location:schedule.php");
}
}else{
 echo "error";
}

?>