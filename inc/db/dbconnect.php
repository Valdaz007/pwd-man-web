<?php

function dbconxn() {
    $conxn = mysqli_connect("localhost", "root", "", "pwd_man_db");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    return $conxn;
}

function dbClose($conxn) {
    mysqli_connect($conxn);
}