<?php

function dbconxn() {
    $conxn = mysqli_connect("hostname", "username", "password", "db");
    // Check connection
    if (!$conxn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conxn;
}
