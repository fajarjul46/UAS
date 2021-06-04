<?php
session_start();
if (is_null($_SESSION['username']) && is_null($_SESSION['fullname'])) {
    echo "<script>alert('Sorry You Not yet Login');
        window.location = '../login/';</script>";
}

$id = $_SESSION['id'];
$fullname = $_SESSION['fullname'];
$username = $_SESSION['username'];
