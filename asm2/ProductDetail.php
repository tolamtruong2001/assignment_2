<?php
    $id = $_GET['id'];
    require_once("admin/DatabaseConnect.php");
    
    $sql = "SELECT * FROM product WHERE product_id='$id'";
    $result = $conn -> query($sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product detail</title>
    <link rel="stylesheet" href="CSS/Style.css">
</head>
<body>
    <table width="100%" border="1" style="border-collapse:collapse">
        <tr>
            <td width="20%" style="padding-left: 1%">
                <b><i>Product name:</i></b>
            </td>
            <td style="padding-left: 1%">
                <?php
                    echo $row['product_name'];
                ?>
            </td>
        </tr>
        <tr>
            <td class="tbDetail">
                <b><i>Product image:</i></b>
            </td>
            <td class="tbDetail">
                <img src="admin/<?php echo $row['product_image']; ?>" height="200px">
            </td>
        </tr>
        <tr>
            <td class="tbDetail">
                <b><i>Product price:</i></b>
            </td>
            <td style="padding-left: 1%">
                <?php echo number_format($row['product_price'],0); ?> VND
            </td>
        </tr>
        <tr>
            <td class="tbDetail">
                <b><i>Product description:</i></b>
            </td>
            <td class="tbDetail">
                <?php echo $row['product_description']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <center><a href="index.php?page=Cart&action=add&id=<?php echo $row['product_id']; ?>"><button>Add to cart</button></a></center>
            </td>
        </tr>
    </table>
</body>
</html>