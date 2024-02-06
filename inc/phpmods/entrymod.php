<?php

session_start();
include "./dbconnect.php";

if (!isset($_SESSION['uid'])) {
    header("Location: ./index.php");
    exit();
}

//? ADD ENTRY
function addentry() {
    $conn = dbconxn();

    $sql = "
        INSERT INTO `tbl_accounts` (`acct_id`, `acct_uid`, `acct_title`, `acct_upwd`, `acct_uname`, `acct_email`, `acct_type`) 
        VALUES ('NULL','".$_SESSION['uid']."', '".$_POST['title']."', '".$_POST['upwd']."', '".$_POST['uname']."', '".$_POST['email']."', '".$_POST['type']."');
    ";

    //?INSERT USER
    if (mysqli_query($conn, $sql)) {
        $_SESSION['entry_status'] = "New Entry Added!";
        mysqli_close($conn);
        header("Location: ./../../dashboard.php");
        exit();
    }
    else {
        echo "Error: ".$sql."<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

//TODO DELETE ENTRY


if(isset($_POST['submit'])) {
    addentry();
}