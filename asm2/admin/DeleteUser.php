<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        require_once ("DatabaseConnect.php");

        $sql = "DELETE FROM user WHERE user_ID='$id'";

        if($conn -> query($sql) == true){
            header("Location: index.php?page=ListUser");
        }
        else
            echo "Delete user failed!";
    }
?>