<?php

require_once ("admin/DatabaseConnect.php");
if(!isset($_SESSION['user'])){
    echo '<meta http-equiv="Refresh" content="0; url=index.php?page=Login">';
}
if(isset($_GET["action"])){
    switch ($_GET["action"]){
        case "delete":
            unset($_SESSION['cart']["{$_GET["id"]}"]);
            break;
        case "up":
            if(isset($_SESSION['cart']["{$_GET["id"]}"])){
                $_SESSION['cart']["{$_GET["id"]}"]["quantity"]+=1;
            }
            break;
        case "down":
            if(isset($_SESSION['cart']["{$_GET["id"]}"])){
                $_SESSION['cart']["{$_GET["id"]}"]["quantity"]-=1;
                if($_SESSION['cart']["{$_GET["id"]}"]["quantity"]<=0){
                    unset($_SESSION['cart']["{$_GET["id"]}"]);
                }
            }
            break;
        case "add":
            if(isset($_GET['id'])){
                $rs = $conn->query("SELECT * FROM `product` WHERE `product_id` = '{$_GET['id']}'");
                $quantity = isset($_POST["quantity"])?$_POST["quantity"]:1;
            
                if($rs->num_rows == 1){
                    $p = $rs->fetch_assoc();
                    $id = $_GET['id'];
                    if(!isset($_SESSION['cart'])){
                        $_SESSION['cart'] = ["{$id}"=>["p"=>$p, "quantity"=> $quantity]];
                    }else{
                        if(isset($_SESSION['cart']["{$id}"])){
                            $_SESSION['cart']["{$id}"]["quantity"] +=  $quantity;
                        }else{
                            $cart = $_SESSION['cart'];
                            $cart["{$id}"] = ["p"=>$p, "quantity"=> $quantity];
                            $_SESSION['cart'] = $cart;
                        }
                    }
                }
            }
            break;
    }
    echo '<meta http-equiv="Refresh" content="0; url=index.php?page=Cart">';
}
?>
<style>
    div.cart_quantity_button{
        margin: auto 0;
        text-align: center;
    }
</style>
<table border='1' width="100%" style="border-collapse: collapse;">
    <thead>

        <tr class="cart_menu">
            <th class="image" colspan="2">Item</th>
            <th class="price">Price</th>
            <th class="quantity">Quantity</th>
            <th class="total">Total</th>
            <th></th>
        </tr>

    </thead>
    <tbody>
        <?php
            $total = 0;
            if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
                echo "<tr><td colspan=5>No product in Cart</td></tr>";
            }
            else
            foreach($_SESSION['cart'] as $id => $item){
                $p = $item["p"];
                $quantity = $item["quantity"];
                $total+=$p["product_price"]*$item["quantity"];
        ?>
        <tr>
            <td class="cart_product" width="20%" style="border-right: 0; vertical-align: middle;  text-align: center;">
                    <a href=""><img width="60" src="admin/<?php echo $p["product_image"]; ?>" alt=""></a>
            </td >
            <td style="border-left: 0">
                    <a href="#"><?php echo $p["product_name"]; ?></a>
            </td>
            <td class="cart_price">
                <p><?php echo number_format($p["product_price"],0); ?> VND</p>
            </td>
            <td class="cart_quantity">
                <div class="cart_quantity_button">
                    <a class="cart_quantity_down" href="?page=Cart&action=down&id=<?php echo $id;?>"> - </a>
                    <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $quantity;?>" autocomplete="off" size="2" readonly="readonly" >
                    <a class="cart_quantity_up" href="?page=Cart&action=up&id=<?php echo $id;?>"> + </a>
                </div>
            </td>
            <td class="cart_total">
                <p class="cart_total_price"><?php  echo number_format($quantity*$p["product_price"],0); ?></p>
            </td>
            <td class="cart_delete" style="text-align:center">
                <a class="cart_quantity_delete" href="?page=Cart&action=delete&id=<?php echo $id;?>"><button>Delete</button></a>
            </td>
        </tr>
        <?php } ?>
        <tr><td colspan="6" style="text-align:right"><h3>Total: <?php echo number_format($total,0);?> VND</h3></td></tr>  
        <tr><td colspan="6" style="text-align:right"><a href="index.php" class="btn btn-primary">Continue to buy</a></td></tr>
    </tbody>
</table>
<section id="do_action">
    <div class="container">
        <div class="row">
            
            <div class="col-sm-6">
                <div class="total_area">
                    <div class="shopper-info">
                        <p>Shopper Information</p>
                        <form action="Checkout.php" method="POST">
                            <input type="text" name="address" style="width: 50%" value="<?php echo $_SESSION["user"]["user_address"]?>" placeholder="Input address">
                            <button type="submit" class="btn btn-primary" name="btnCheckout">Checkout</button>
                        </form>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->