<?php
session_start();
include './dbconnect.php';

function checkEmailInDB($email){
    $conn = dbconxn();
    $sql = "SELECT `user_email` FROM `tbl_user` WHERE `user_email`='".$email."';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1){
        //return mysqli_fetch_assoc($result)['user_email'];
        mysqli_close($conn);
        $_SESSION['reset_status'] = rand(1000, 9999);
        $_SESSION['reset_email'] = $_POST['email'];
    }
    else {
        mysqli_close($conn);
        $_SESSION['reset_fail'] = "Invalid Email Address!";
    }
    header("Location: ../../resetpwd.php");
}

if(isset($_POST['send'])){
    checkEmailInDB($_POST['email']);
}
elseif(isset($_POST['verify'])){
    if($_POST['code'] == $_SESSION['reset_status']){        
        $_SESSION['reset_pwd'] = "True";
        unset($_SESSION['reset_status']);
        header("Location: ../../resetpwd.php");
    }
    else {
        $_SESSION['reset_fail'] = $_POST['code'].' '.$_SESSION['reset_status'];
        unset($_SESSION['reset_status']);
        header("Location: ../../resetpwd.php");
    }
}
elseif(isset($_POST['resetpwd'])){
    $conn = dbconxn();
    $sql = "UPDATE `tbl_user` SET `user_pwd` = '".$_POST['pwd']."' WHERE `tbl_user`.`user_email` = '".$_SESSION['reset_email']."';";
    if(mysqli_query($conn, $sql)){
        $_SESSION['status'] = "Password Reset Successfully!";
        unset($_SESSION['reset_pwd']);
        unset($_SESSION['reset_email']);
        header("Location: ../../index.php");
    }
}
else {
    unset($_SESSION['reset_pwd']);
    unset($_SESSION['reset_email']);
    unset($_SESSION['reset_status']);
    header("Location: ../../index.php");
}