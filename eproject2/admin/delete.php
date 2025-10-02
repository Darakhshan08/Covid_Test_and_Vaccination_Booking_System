<?php

$con=mysqli_connect('localhost','root','','covid');
if(isset($_GET['id'])){
$id=$_GET['id'];

$sql="DELETE from patient where `p_id`=$id";

$res=mysqli_query($con,$sql);
if($res){
 header("location:patients.php");
}
}else{
 echo "error";
}

?>