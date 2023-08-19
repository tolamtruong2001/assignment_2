<?php
//    session_start();

    if(isset($_POST['btnLogin'])){
        require_once "admin/DatabaseConnect.php";
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE user_email='$username' AND user_password=MD5('$password') AND user_status=1";
        $result = $conn -> query($sql);
     
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $row;
            header("Location: index.php");
        }
        else
            echo "Login failed!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <link rel="stylesheet" href="CSS/Style.css">
    <script src="admin/JS/Product_Manage_Script.js"></script>
</head>
<body>
    <form action="" method="POST" onsubmit="return checkLoginForm()">
        <table id="tbLogin">
            <tr>
                <th colspan="2" id="thAddProduct">USER LOGIN</th>
            </tr>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" id="username" name="username">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
            <tr>
                <td colspan="2" id="btnAddProduct">
                    <input type="submit" value="Login" name="btnLogin">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>