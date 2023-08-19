<?php

    if(isset($_POST['btnAdd'])){
        $productName = $_POST['ProductName'];
        $productPrice = $_POST['ProductPrice'];
        $productDescription = $_POST['ProductDescription'];

        // Get product image
        $productImageName = $_FILES['ProductImage']['name'];
        $target_dir = "Images/";
        $target_file = $target_dir . time() . "-" . basename($productImageName);
        if($_FILES['ProductImage']['error'] != 0){
            echo "Image is error!";
            die();
        }
        else if($_FILES['ProductImage']['size'] > 5242880){  // 5MB
            echo "Max Image size is 5MB";
            die();
        }
        else if(file_exists($target_file)){
            echo "Image name is existed!";
            die();
        }
        else{
            move_uploaded_file($_FILES['ProductImage']['tmp_name'], $target_file);
        }

        require "DatabaseConnect.php";

        $sql = "INSERT INTO product(product_name, product_price, product_description, product_image)
                    VALUES ('$productName', '$productPrice', '$productDescription', '$target_file')";

        if($conn -> query($sql)){
        //    echo "Insert successful.";
            header("Location: index.php?page=ListProduct");
        }
       else
            echo "Insert failed!";
    }
    else
        echo "Access denied!";
?>