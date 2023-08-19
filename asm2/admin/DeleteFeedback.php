<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        require_once ("DatabaseConnect.php");

        $sql = "DELETE FROM contact WHERE contact_id='$id'";

        if($conn -> query($sql) == true){
            header("Location: index.php?page=ListFeedback");
        }
        else
            echo "Delete Feedback failed!";
    }
?>