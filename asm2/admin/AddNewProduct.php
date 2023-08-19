<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New product</title>
    <link rel="stylesheet" href="CSS/Product_Manage_Style.css">
    <script src="JS/Product_Manage_Script.js"></script>
</head>
<body>
    <form action="AddNewProductProcess.php" method="post" onsubmit="return ValidateForm()" enctype="multipart/form-data">
        <table id="tbAddNewProduct">
            <tr>
                <th colspan="2" id="thAddProduct">ADD NEW PRODUCT</th>
            </tr>
            <tr>
                <td>Product name</td>
                <td>
                    <input type="text" name="ProductName" id="ProductName">
                </td>
            </tr>
            <tr>
                <td>Pruduct price</td>
                <td>
                    <input type="number" name="ProductPrice" id="ProductPrice" value="20000" step="1000"> VND
                </td>
            </tr>
            <tr>
                <td>Product description</td>
                <td>
                    <textarea name="ProductDescription" id="ProductDescription" cols="33" rows="3"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Product image
                </td>
                <td>
                    <input type="file" name="ProductImage" id="ProductImage" accept="image/*">
                </td>
            </tr>
            <tr>
                <td colspan="2>" id="btnAddProduct">
                    <input type="submit" value="Add Product" class="btn" name="btnAdd">
                    <input type="button" value="Clear" class="btn" onclick="ClearForm()">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>