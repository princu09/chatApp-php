<?php

session_start();

include_once "config.php";

$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);

if (!empty($email) && !empty($password)) {
    // let's check user entered email & password matched to database any table row email and password
    $sql = mysqli_query($connect , "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}' ");
    if (mysqli_num_rows($sql) > 0) { // if users credentials matched
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id other php file
        echo "success";

        $getId = $_SESSION['unique_id'];

        $status = "Active Now";
        
        $sql2 = mysqli_query($connect, "UPDATE users SET status = '{$status}' WHERE unique_id={$getId}");

    }else {
        echo "Email or Password is incorrenct !";
    }
}else {
    echo "All Input Fields are Required !";
}
?>