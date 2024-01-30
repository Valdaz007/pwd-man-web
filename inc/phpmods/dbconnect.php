<?php

function dbconxn() {
    $conxn = mysqli_connect("srv605.hstgr.io", "u380947895_ntt_db_0823", "NTT_db_0823", "u380947895_ntt_db_0823");
    // Check connection
    if (!$conxn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conxn;
}