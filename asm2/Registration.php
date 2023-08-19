<?php
    if(isset($_POST['registrationBtn'])){
        require_once "admin/DatabaseConnect.php";
        
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];

        $sql = "INSERT INTO user(user_fullname, user_email, user_password, user_address, user_phonenumber)
                VALUES('$fullname', '$email', md5('$password'), '$address', '$phonenumber')";
        $result = $conn -> query($sql);

        if($result){
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration</title>
    <link rel="stylesheet" href="CSS/Style.css">
    <script src="JavaScript/JSscript.js"></script>
</head>
<body>
    <form action="" method="POST" onsubmit="return checkUserRegistration()">
        <table id="userRegistration" width="80%">
            <tr>
                <th colspan="2" id="userTH">USER REGISTRATION</th>
            </tr>
            <tr>
                <td>Full name</td>
                <td><input type="fullname" name="fullname" id="fullname"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
            <tr>
                <td>Phone number</td>
                <td><input type="text" name="phonenumber" id="phonenumber"></td>
            </tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td>Retype password</td>
                <td><input type="password" name="password2" id="password2"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" id="address" style="width: 80%"></td>
            </tr>
            <tr id="userRegistration">
                <td colspan="2">
                    <input type="submit" value="Registration" id="registration" name="registrationBtn">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>