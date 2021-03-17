<?php 
    $servername  = "localhost";
    $username  = "root";
    $password  = "";
    $database  = "chat";
    
    $connect = mysqli_connect($servername, $username, $password, $database);
    
    if (!$connect) {
        die("Sorry We can't connect to Database");
    }
    else{
        // echo "Connection was successfully";
    }
?>