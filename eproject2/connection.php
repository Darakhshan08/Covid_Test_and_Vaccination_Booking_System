<?php

    $con= new mysqli("localhost","root","","covid");
    if ($con->connect_error){
        die("Connection failed:  ".$con->connect_error);
    }

?>