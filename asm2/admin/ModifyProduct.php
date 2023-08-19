<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        require_once "DatabaseConnect.php";

        $sql = "SELECT * FROM product WHERE product_id='$id'";
        $result = $conn -> query($sql);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
        }
    }
?>

<?php
    if(isset($_POST['btnModify'])){
        $product_name = $_POST['ProductName'];
        $product_price = $_POST['ProductPrice'];
        $product_description = $_POST['ProductDescription'];
        $product_image_new = $_FILES['NewImage']['name'];

        if(!empty($product_name) && !empty($product_price) && !empty($product_description) && empty($product_image_new)){          // Not new image
            $sqlupdate = "UPDATE product
                          SET product_name = '$product_name' , product_price='$product_price' , product_description='$product_description'
                          WHERE product_id='$id'";
            
            if($conn -> query($sqlupdate)){     // Update DB
                header("Location: index.php?page=ListProduct");
            }
            else
                echo "Update product failed!";
        }
        else if(!empty($product_name) && !empty($product_price) && !empty($product_description) && !empty($product_image_new)){     // New image
            $old_image_path = $row['product_image'];
            unlink($old_image_path);    // Delete old image

            $target_dir = "Images/";
            $target_file = $target_dir . time() . "-" . basename($product_image_new);
            if($_FILES['NewImage']['error'] != 0){
                echo "Image is error!";
                die();
            }
            else if($_FILES['NewImage']['size'] > 5242880){  // 5MB
                echo "Max Image size is 5MB";
                die();
            }
            else if(file_exists($target_file)){
                echo "Image name is existed!";
                die();
            }
            else{
                move_uploaded_file($_FILES['NewImage']['tmp_name'], $target_file);      // Upload new image

                // Update DB
                $sqlupdate = "UPDATE product
                              SET product_name = '$product_name' , product_price='$product_price' , product_description='$product_description' , product_image='$target_file'
                              WHERE product_id='$id'";
            
                if($conn -> query($sqlupdate)){
                    header("Location: index.php?page=ListProduct");
                }
                else
                    echo "Update product failed!";
            }
        }
        else
            echo "Empty information!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modify product</title>
    <link rel="stylesheet" href="CSS/Product_Manage_Style.css">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
        <table id="tbAddNewProduct">
            <tr>
                <th colspan="2" id="thAddProduct">MODIFY PRODUCT</th>
            </tr>
            <tr>
                <td>Product name</td>
                <td>
                    <input type="text" name="ProductName" id="ProductName" value="<?php echo $row['product_name']; ?>">
                </td>
            </tr>
            <tr>
                <td>Pruduct price</td>
                <td>
                    <input type="number" name="ProductPrice" id="ProductPrice" value="<?php echo $row['product_price']; ?>" step="1000"> VND
                </td>
            </tr>
            <tr>
                <td>Product description</td>
                <td>
                    <textarea name="ProductDescription" id="ProductDescription" cols="33" rows="3"><?php echo $row['product_description']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Product image</td>
                <td><img src="<?php echo $row['product_image']; ?>" height="100px"></td>
            </tr>
            <tr>
                <td>New image</td>
                <td>
                    <input type="file" name="NewImage" id="NewImage">
                </td>
            </tr>
            <tr>
                <td colspan="2>" id="btnAddProduct">
                    <input type="submit" value="Modify Product" class="btn" name="btnModify">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>