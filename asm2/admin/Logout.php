<?php
    session_start();
    unset($_SESSION['adminAcc']);
    header("Location: Login.php");
?>