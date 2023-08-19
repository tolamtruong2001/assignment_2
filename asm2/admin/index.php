<?php
    session_start();

    if(!isset($_SESSION['adminAcc']))
        header("Location: Login.php");
    else{
        $AdminName = $_SESSION['adminAcc']['admin_fullname'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator page</title>
    <link rel="stylesheet" href="CSS/MenuStyles.css">
</head>
<body>
    <div style="text-align: right; margin-right: 5%">
        <?php
            echo "Hello " .  $AdminName;
        ?>
        <a href="Logout.php"><button>Logout</button></a>
    </div>

<!-- Menu -->
    <div id="tabs">
        <ul>
            <li><a href="index.php?page=AddProduct"><span>Add Product</span></a></li>
            <li><a href="index.php?page=ListProduct"><span>List Product</span></a></li>
            <li><a href="index.php?page=ListUser"><span>List User</span></a></li>
            <li><a href="index.php?page=ListFeedback"><span>List Feedback</span></a></li>
            <li><a href="index.php?page=ListInvoice"><span>List Invoice</span></a></li>
        </ul>
    </div>

<!-- Content -->
    <div>
        <?php
            if(isset($_GET['page'])){
                if($_GET['page'] === "AddProduct")
                    require_once ("AddNewProduct.php");
                else if($_GET['page'] === "ListProduct")
                    require_once ("ListProduct.php");
                else if($_GET['page'] === "ModifyProduct")
                    require_once ("ModifyProduct.php");
                else if($_GET['page'] === "DeleteProduct")
                    require_once ("DeleteProduct.php");
                else if($_GET['page'] === "ListUser")
                    require_once ("ListUser.php");
                else if($_GET['page'] === "ModifyUser")
                    require_once ("ModifyUser.php");
                else if($_GET['page'] === "DeleteUser")
                    require_once ("DeleteUser.php");
                else if($_GET['page'] === "ListFeedback")
                    require_once ("ListFeedback.php");
                else if($_GET['page'] === "DeleteFeedback")
                    require_once ("DeleteFeedback.php");
                else if($_GET['page'] === "ListInvoice")
                    require_once ("ListInvoice.php");
                else if($_GET['page'] === "InvoiceDetail")
                    require_once ("InvoiceDetail.php");
            }
            else
                echo "<marquee direction='right' scrolldelay='80'>Welcome to Administrator page</marquee>";
        ?>
    </div>
</body>
</html>