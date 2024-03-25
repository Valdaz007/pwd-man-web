<?php

include './dbconnect.php';
include './mailmod.php';

function checkEmailInDB($email){
    $conn = dbconxn();
    $sql = "SELECT `user_email` FROM `tbl_user` WHERE `user_email`='".$email."';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1){
        mysqli_close($conn);
        echo 'Email Check Good';
        return true;
    }
    else {
        mysqli_close($conn);
        return false;
    }
}

if (isset($_POST['cancel'])) {
        unset($_SESSION['reset_email']);
        unset($_SESSION['reset_code']);
        unset($_SESSION['reset_pwd']);
        header("Location: ../../index.php");
        exit();
}

if(isset($_POST['send'])){
    if(checkEmailInDB($_POST['email'])){
        $_SESSION['reset_email'] = $_POST['email'];
        $_SESSION['reset_code'] = rand(1000, 9999);
        send($_POST['email'], $_SESSION['reset_code']);
        $_SESSION['reset_alert'] = "Check Email for Verification Code!";
        header("Location: ../../resetpwd.php");
        exit();
    }
    else {
        $_SESSION['reset_alert'] = "Invalid Email Address!";
        header("Location: ../../resetpwd.php");
        exit();
    }
}

if (isset($_POST['verify'])){
    if ($_POST['code']==""){
        $_SESSION['reset_alert'] = "Please Enter Your Verification Code";
        header("Location: ../../resetpwd.php");
        exit();
    }
    if ($_POST['code']==$_SESSION['reset_code']){
        $_SESSION['reset_pwd'] = $_SESSION['reset_email'];
        unset($_SESSION['reset_email']);
        unset($_SESSION['reset_code']);
        header("Location: ../../resetpwd.php");
        exit();
    }
    else {
        $_SESSION['reset_alert'] = "Invalid Code!";
        header("Location: ../../resetpwd.php");
        exit();
    }
}

if (isset($_POST['resetpwd'])) {
    if ($_POST['newpwd']==""){
        $_SESSION['reset_alert'] = "Invalid Password Format";
        header("Location: ../../resetpwd.php");
        exit();
    }
    
    $conn = dbconxn();
    $sql = "UPDATE `tbl_user` SET `user_pwd` = '".$_POST['newpwd']."' WHERE `tbl_user`.`user_email` = '".$_SESSION['reset_pwd']."';";
    if(mysqli_query($conn, $sql)){
        $_SESSION['status'] = "Password Reset Successfully!";
        unset($_SESSION['reset_pwd']);
        header("Location: ../../index.php");
    }
}
