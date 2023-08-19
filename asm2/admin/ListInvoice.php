<?php
    require_once ("DatabaseConnect.php");

    $sql = "SELECT * FROM invoice
            INNER JOIN user ON invoice.user_id=user.user_ID";
    $result = $conn -> query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage user</title>
    <script src="JS/Product_Manage_Script.js"></script>
    <link rel="stylesheet" href="CSS/Product_Manage_Style.css">
</head>
<body>
    <table border="1" id="ListProduct">
        <tr id="ListProductTitle">
            <td colspan="6">LIST INVOICE</td>
        </tr>
        <tr>
            <th width="7%">ID</th>
            <th width="15%">User</th>
            <th width="15%">Total price</th>
            <th width="14%">Date</th>
            <th>Address</th>
            <th width="10%">Detail</th>
        </tr>

        <?php
            if(mysqli_num_rows($result) > 0)
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td class="tdEdit"><?php echo $row['id']; ?></td>
            <td><?php echo $row['user_fullname']; ?></td>
            <td class="tdEdit"><?php echo number_format($row['total_price'],0); ?></td>
            <td class="tdEdit"><?php echo $row['create_date']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td class="tdEdit">
                <a href="index.php?page=InvoiceDetail&id=<?php echo $row['id']; ?>">Detail</a>
            </td>
        </tr>

        <?php
            }
        ?>
    </table>
</body>
</html>