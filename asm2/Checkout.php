<?php
    session_start();
    require_once ("admin/DatabaseConnect.php");
    if(isset($_SESSION['cart']) && isset($_SESSION['user']) && isset($_POST['btnCheckout']) && count($_SESSION['cart']) > 0){
        $total = 0;
        foreach($_SESSION['cart'] as $id => $cart){
            $p = $cart["p"];
            $quantity = $cart["quantity"];
            $total  +=  $p["product_price"] * $quantity;
        }
        $conn->begin_transaction();
        try {
            $sql = "INSERT INTO `invoice`(`id`, `user_id`, `total_price`, `address`) 
                    VALUES (null,'{$_SESSION['user']['user_ID']}','{$total}','{$_POST['address']}')";
            if ($conn->query($sql) === TRUE) {
                $invoice_id = $conn->insert_id;
                foreach($_SESSION['cart'] as $id => $cart){
                    $p = $cart["p"];
                    $quantity = $cart["quantity"];
                    $sql = "INSERT INTO `invoice_detail`(`id`, `product_id`, `quantity`, `invoice_id`) 
                        VALUES (null,'{$p['product_id']}','{$quantity}','{$invoice_id}')";
                    $conn->query($sql);
                }
            }
            $conn->commit();
            unset($_SESSION['cart']);
            echo "<script>
                    alert('Successfully');
                    window.location.href='index.php';
                </script>";
        }catch (mysqli_sql_exception $exception) {
            $conn->rollback();
            echo "<script>
                    alert('Error');
                    window.location.href='index.php?page=Cart';
                </script>";
        }
    }else{
        echo "<script>
            alert('No product in cart');
            window.location.href='index.php';
        </script>";
    }
?>