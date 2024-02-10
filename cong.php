<?php

    try{

        $conn1=mysqli_connect("localhost","root","","proj3");
    }
    catch(mysqli_sql_exception){
        echo " YOUR ARE NOT CONNECTED";
    }
?>