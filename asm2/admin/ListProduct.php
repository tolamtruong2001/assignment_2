<?php
    require_once "DatabaseConnect.php";

    $sql = "SELECT * FROM product";

    $result = $conn -> query($sql);     // $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Product</title>
    <link rel="stylesheet" href="CSS/Product_Manage_Style.css">
</head>
<body>
    <table border="1" id="ListProduct">
        <tr id="ListProductTitle">
            <td colspan="6">LIST PRODUCT</td>
        </tr>
        <tr>
            <th width="10%">
                Product ID
            </th>
            <th width="17%">
                Product name
            </th>
            <th width="12%">
                Product price
            </th>
            <th>
                Product description
            </th>
            <th>
                Product image
            </th>
            <th width="15%">
                Edit
            </th>
        </tr>

        <?php
            if(mysqli_num_rows($result) > 0)
                while($row = mysqli_fetch_assoc($result)) {
        ?>

        <tr>
            <td class="tdEdit">
                <?php echo $row['product_id']; ?>
            </td>
            <td>
                <?php echo $row['product_name']; ?>
            </td>
            <td>
                <?php echo number_format($row['product_price'],0); ?>
            </td>
            <td>
                <?php echo $row['product_description']; ?>
            </td>
            <td>
                <img src="<?php echo $row['product_image']; ?>" height="90px">
            </td>
            <td class="tdEdit">
                <a href="index.php?page=ModifyProduct&id=<?php echo $row['product_id']; ?>">Modify</a> |
                <a href="index.php?page=DeleteProduct&id=<?php echo $row['product_id']; ?>">Delete</a>
            </td>
        </tr>

        <?php
            }
        ?>

    </table>
</body>
</html>