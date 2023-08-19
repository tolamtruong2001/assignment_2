<?php
    if(isset($_GET['id'])){
        require_once "DatabaseConnect.php";
        $id = $_GET['id'];

        // Get image path
        $sql_image = "SELECT product_image FROM product WHERE product_id='$id'";
        $result = $conn -> query($sql_image);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $image_path = $row['product_image'];
        }

        $sql = "DELETE FROM product WHERE product_id='$id'";

        if($conn -> query($sql) == true){
            unlink($image_path);                // Delete image
            header("Location: index.php?page=ListProduct"); 
        }
        else
            echo "Delete product failed!";
    }
?>