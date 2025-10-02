
    <?php
    
    

    //import database
    include("../connection.php");



    if($_POST){
        //print_r($_POST);
        $result= $con->query("select * from web_user");
        $name=$_POST['name'];
        $nic=$_POST['nic'];
        $oldemail=$_POST["oldemail"];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $tele=$_POST['Tele'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $id=$_POST['id00'];
        
        if ($password==$cpassword){
            $error='3';
            $aab="SELECT patient.p_id from patient inner join web_user on patient.p_email=web_user.email where web_user.email='$email';";
            $result= $con->query($aab);
            //$resultqq= $database->query("select * from Hospital where hospid='$id';");
            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["p_id"];
            }else{
                $id2=$id;
            }
            

            if($id2!=$id){
                $error='1';
                //$resultqq1= $database->query("select * from Hospital where hospemail='$email';");
                //$did= $resultqq1->fetch_assoc()["hospid"];
                //if($resultqq1->num_rows==1){
                    
            }else{

                //$sql1="insert into Hospital(hospemail,hospname,hosppassword,hospnic,hosptel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
                $sql1="UPDATE patient set p_email='$email',p_name='$name',p_password='$password',P_nic='$nic',p_contect='$tele',p_address='$address' where p_id=$id ;";
                $con->query($sql1);
                echo $sql1;
                $sql1="UPDATE web_user set email='$email' where email='$oldemail' ;";
                $con->query($sql1);
                echo $sql1;
                
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