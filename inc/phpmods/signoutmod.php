<?php

session_start();
unset($_SESSION['uid']);
unset($_SESSION['una']);

header("Location: ./../../index.php");