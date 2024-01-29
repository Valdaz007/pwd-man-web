<?php
session_start();
include "./dbconnect.php";

function signupUser() {
    $conn = dbconxn();

    $sql = "
        INSERT INTO `tbl_user` (`user_email`, `user_fname`, `user_lname`, `user_name`, `user_pwd`, `user_role`) 
        VALUES ('".$_POST['uemail']."', '".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['uname']."', '".$_POST['upwd']."', 'user');
    ";

    if (emailCheck($conn)) {
        $_SESSION['status'] = "Email Already Exits!";
        header("Location: ./../../signup.php");
        exit();
    }

    //?INSERT USER
    if (mysqli_query($conn, $sql)) {
        $_SESSION['status'] = "New Record Added!";
        mysqli_close($conn);
        header("Location: ./../../index.php");
        exit();
    }
    else {
        echo "Error: ".$sql."<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

function emailCheck($conn) {
    //TODO: CHECK IF USER EMAIL ALREADY EXIST
    $sql = "SELECT `user_email` FROM `tbl_user` WHERE `user_email` = '".$_POST['uemail']."';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        mysqli_close($conn);
        return true;
    }
    else {
        return false;
    }
}

signupUser();