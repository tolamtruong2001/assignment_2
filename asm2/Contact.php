<?php
    $info = "";
    $namedb = "";
    $emaildb = "";
    if(isset($_SESSION['user'])){
        $namedb = $_SESSION['user']['user_fullname'];
        $emaildb = $_SESSION['user']['user_email'];
    }

    if(isset($_POST['submitBtn'])){
        require_once ("admin/DatabaseConnect.php");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact(contact_name, contact_email, contact_title, contact_message)
        VALUES ('$name' , '$email' , '$title' , '$message')";
        if($conn -> query($sql)){
            $info = "Submit feedback successful.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <script src="JavaScript/JSscript.js"></script>
</head>
<body>
    <table width="95%">
        <tr>
            <th colspan="2">OUR CONTACT</th>
        </tr>
        <tr>
            <td>Address:</td>
            <td>41 Cách Mạng Tháng Tám, P.An Hòa, Q.Ninh Kiều, TP.Cần Thơ</td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>+84 911139225</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>info@YourDomain.com</td>
        </tr>

    <form action="" method="post" onsubmit="return checkContact()">
        <tr>
            <th colspan="2"><hr>YOUR FEEDBACK</th>
        </tr>
        <tr>
            <td>Your name:</td>
            <td><input type="text" name="name" id="name" value="<?php echo $namedb; ?>"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" id="email" value="<?php echo $emaildb; ?>"></td>
        </tr>
        <tr>
            <td>Title:</td>
            <td><input type="text" name="title" id="title"></td>
        </tr>
        <tr>
            <td>Message:</td>
            <td><textarea name="message" id="message" cols="45" rows="5"></textarea></td>
        </tr>
        <tr style="text-align: center">
            <td colspan="2">
                <input type="submit" value="Submit" name="submitBtn" id="submitBtn">
            </td>
        </tr>
    </form>
    </table>

    <?php echo "<i><b>".$info."</b></i>"; ?>
</body>
</html>