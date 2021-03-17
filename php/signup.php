<?php

session_start();

include_once "config.php";

$fname = mysqli_real_escape_string($connect, $_POST['fname']);
$lname = mysqli_real_escape_string($connect, $_POST['lname']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    // let's check user email is valid or not 
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // if email is valid
        // let's check that email already exist in the database or not
        $sql = mysqli_query($connect, "SELECT email FROM users WHERE email = '{$email}' ");
        if (mysqli_num_rows($sql) > 0) { // if email already exist
            echo "$email - This email already exist !!";
        } else {
            // let's check user upload file or not
            if (isset($_FILES['image'])) { // if file is uploaded
                $img_name = $_FILES['image']['name']; // getting user upload image name
                $tmp_name = $_FILES['image']['tmp_name']; // this is temporary name is used to save/move file in our folder

                // let's explore image and get the last extension like jpg png
                $img_exlode = explode('.', $img_name);
                $img_ext = end($img_exlode); // here we get the extension of an user upload img file

                $extensions = ['png', 'jpeg', 'jpg']; // these are some valid img ext and we've store them in array
                if (in_array($img_ext, $extensions) === true) { // if user uploaded img ext is matched with any array extensions

                    $time =  time(); // this will return us current time... // We need this time becuase when you uploading user image to in our folder we rename user file with current time // so all the image file will have a unique name

                    // let's move the user uploaded img to our particular folder
                    $new_img_name = $time.$img_name;
                    
                    $upload_dir = "images/$new_img_name";
                    if(move_uploaded_file($tmp_name, $upload_dir )) { // if user upload img move to our folder successfully

                        $status = "Active Now"; // once user signed up then his status will be active now
                        $random_id = rand(time(), 100000000); // Creating random id for user

                        // let's insert all user data inside table
                        $sql2 = mysqli_query($connect, "INSERT INTO users (`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES ( '{$random_id}' , '{$fname}' , '{$lname}' , '{$email}' , '{$password}' , '{$new_img_name}' ,'{$status}')");

                        if ($sql2) { // if these data inserted

                            $sql3 = mysqli_query($connect, "SELECT * FROM  users WHERE email = '{$email}' ");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id other php file
                                echo "success";
                            }
                        } else {
                            echo "Something went wrong !";
                        }
                    }
                } else {
                    echo "Please select an Image file - jpeg , jpg , png !";
                }
            } else {
                echo "Please select an Image File !";
            }
        }
    } else {
        echo "$email - This is not a valid email !";
    }
} else {
    echo "All Input Field are required !";
}

?>