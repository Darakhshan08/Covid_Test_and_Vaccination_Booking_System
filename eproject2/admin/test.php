<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

.con{

    display:flex;
}

.ch{

display:flex;
}
#ll{
    margin-top:20px;
    margin-left:900px;
}
</style>
<body>
    <div class="con">
       <div class="ch"><h2>Appointment Manager</h2></div>
       <div class="ch" id="ll">

       <?php 

include('../connection.php');


date_default_timezone_set('Asia/Karachi');

$today = date('Y-m-d');
echo $today;

$list110 = $con->query("select  * from  schedule;");

?>
       </div>



    </div>
</body>
</html>