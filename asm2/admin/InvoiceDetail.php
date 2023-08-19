<?php
    require_once ("DatabaseConnect.php");
    $id = $_GET['id'];

    $sql = "SELECT * FROM invoice_detail
            INNER JOIN invoice ON invoice.id=invoice_detail.invoice_id
            INNER JOIN product ON invoice_detail.product_id=product.product_id
            WHERE invoice.id='$id'";
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
            <td colspan="6">ID <?php echo $id; ?> - INVOICE DETAIL</td>
        </tr>
        <tr>
            <th width="15%">Product name</th>
            <th width="10%">Product price</th>
            <th width="9%">Quantity</th>
            <th width="9%">Sumary</th>
        </tr>

        <?php
            $sum_quantity = 0;
            $sum_total = 0;
            if(mysqli_num_rows($result) > 0)
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td><?php echo $row['product_name']; ?></td>
            <td class="tdEdit"><?php echo number_format($row['product_price'],0); ?></td>
            <td class="tdEdit"><?php echo $row['quantity']; $sum_quantity+=$row['quantity']; ?></td>
            <td class="tdEdit">
                <?php echo number_format($row['product_price']*$row['quantity'],0); $sum_total+=$row['product_price']*$row['quantity']; ?>
            </td>
        </tr>


        <?php
            }
        ?>
        <tr>
            <td colspan="2" style="text-align: right"><i>TOTAL</i></td>
            <td class="tdEdit"><i><?php echo $sum_quantity; ?></i></td>
            <td class="tdEdit"><i><?php echo number_format($sum_total,0); ?> VND</i></td>
        </tr>
    </table>
    <br>
    <div style="text-align:center; font-weight: bold"><a href="index.php?page=ListInvoice">Back to List invoice</a></div>
</body>
</html>