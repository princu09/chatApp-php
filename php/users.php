<?php 
    
    session_start();
    include_once "config.php";
    $sql = mysqli_query($connect , "SELECT * FROM users");

    if (mysqli_num_rows($sql) == 0) {
        $output = "No Users are Available to chat";
    }elseif (mysqli_num_rows($sql) > 0) {
        include "data.php";
    }
    echo $output;
?>