<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    if ($_SESSION['role'] == "admin") {
        header("Location: /../adminpage/admin.php");
    }
    else {
        header("Location: /../userpage/user.php");
    }
}
else {
    header("Location: /../index.php");
}
?>