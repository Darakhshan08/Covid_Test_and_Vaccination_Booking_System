
    <?php
    
    

    //import database
    include("../connection.php");



    if($_POST){
        //print_r($_POST);
        $result= $con->query("select * from web_user");
        $name=$_POST['name'];
        $oldemail=$_POST["oldemail"];
        $nic=$_POST['nic'];
        $spec=$_POST['spec'];
        $email=$_POST['email'];
        $tele=$_POST['Tele'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $id=$_POST['id00'];
        
        if ($password==$cpassword){
            $error='3';
            $result= $con->query("select hospital.h_id from hospital inner join web_user on hospital.h_email=web_user.email where web_user.email='$email';");
            //$resultqq= $database->query("select * from Hospital where hospid='$id';");
            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["h_id"];
            }else{
                $id2=$id;
            }
            
            echo $id2."jdfjdfdh";
            if($id2!=$id){
                $error='1';
                //$resultqq1= $database->query("select * from Hospital where hospemail='$email';");
                //$did= $resultqq1->fetch_assoc()["hospid"];
                //if($resultqq1->num_rows==1){
                    
            }else{

                //$sql1="insert into Hospital(hospemail,hospname,hosppassword,hospnic,hosptel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
                $sql1="update hospital set h_email='$email',h_name='$name',h_assword='$password',h_nic='$nic',h_contect='$tele' where h_pid=$id ;";
                $con->query($sql1);

                $sql1="update web_user set email='$email' where email='$oldemail' ;";
                $con->query($sql1);

                echo $sql1;
                //echo $sql2;
                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: settings.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>