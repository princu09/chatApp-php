<?php
    include_once "config.php";

    $searchTerm = mysqli_real_escape_string($connect , $_POST['searchTerm']);

    $output = "";

    $sql = mysqli_query($connect , "SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' ");

    if (mysqli_num_rows($sql) > 0) {
        include "data.php";
    }else {
        $output = "No User Found releted to your search term";
    }
    echo $output; 
?>