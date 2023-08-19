<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "product_manage";

    $conn = mysqli_connect($host, $username, $password, $database);

    if($conn -> connect_error){
        die("Connect Database server failed!" . $conn->connect_error);
    }
    // else
    //     echo "Connect Database server successful.";
?>