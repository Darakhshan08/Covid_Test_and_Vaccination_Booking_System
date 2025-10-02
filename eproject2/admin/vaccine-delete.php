<?php

$con=mysqli_connect('localhost','root','','covid');
if(isset($_GET['id'])){
$id=$_GET['id'];

$sql="DELETE FROM `vaccine` WHERE `vaccine_id`=$id";

$res=mysqli_query($con,$sql);
if($res){
 header("location:vaccine.php");
}
}else{
 echo "error";
}

?>