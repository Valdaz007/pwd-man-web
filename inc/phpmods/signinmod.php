<?php
session_start();
include "./dbconnect.php";

$conn = dbconxn();

$sql = "SELECT * FROM `tbl_user` WHERE `user_name` = '".$_POST['uname']."' AND `user_pwd` = '".$_POST['upwd']."'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    echo $row['user_id']." ".$row['user_name']." ".$row['user_pwd']." ".$row['user_role'];
    mysqli_close($conn);

    header("Location: ./../../dashboard.php");
}
else {
    //? Incorrect Username or Password
    $_SESSION['login_status'] = "Incorrect Username or Password!";
    header("Location: ./../../index.php");
}