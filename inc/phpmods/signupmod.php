<?php

include "./dbconnect.php";

// $fname = $_POST['fname'];
// $lname = $_POST['lname'];
// $uemail = $_POST['uemail'];
// $uname = $_POST['uname'];
// $upwd = $_POST['upwd'];

function signupUser() {
    $conn = dbconxn();
    if(!$conn){
        echo "DB Connection Failed!";
    }

    $sql = "
        INSERT INTO `tbl_user` (`user_email`, `user_fname`, `user_lname`, `user_name`, `user_pwd`, `user_role`) 
        VALUES ('".$_POST['uemail']."', '".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['uname']."', '".$_POST['upwd']."', 'user');
    ";

    echo $_POST['uemail'].", ".$_POST['fname'].", ".$_POST['lname'].", ".$_POST['uname'].", ".$_POST['upwd'];

    //TODO: CHECK IF USER EMAIL ALREADY EXIST

    //?INSERT USER
    if (mysqli_query($conn, $sql)) {
        echo "New Record Added!";
    }
    else {
        echo "Error: ".$sql."<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

signupUser();