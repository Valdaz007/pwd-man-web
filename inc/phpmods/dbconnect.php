<?php

function dbconxn() {
    $conxn = mysqli_connect("localhost", "root", "", "pwd_man_db");
    // Check connection
    if (!$conxn) {
        die("Connection failed: " . mysqli_connect_error());
        return false;
    }
    return $conxn;
}