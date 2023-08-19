<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        require_once ("DatabaseConnect.php");

        $sql1 = "SELECT * FROM user WHERE user_ID='$id'";
        $result = $conn -> query($sql1);
        if(mysqli_num_rows($result) == 1)
            $row = mysqli_fetch_assoc( $result);
    }
?>

<?php
    if(isset($_POST['modifyBtn'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if(empty($password)){   // Do not update password
            $sqlUpdate = "UPDATE user
                          SET user_fullname='$fullname' , user_email='$email' ,  user_address='$address' , user_status='$status'
                          WHERE user_ID='$id'";
            if($conn -> query($sqlUpdate) == true)
                header("Location: index.php?page=ListUser");
        }
        else{   // Update password
            if($password == $password2){
                $sqlUpdate = "UPDATE user
                              SET user_fullname='$fullname' , user_email='$email' ,  user_address='$address' , user_status='$status' , user_password=md5('$password')
                              WHERE user_ID='$id'";
                if($conn -> query($sqlUpdate) == true)
                    header("Location: index.php?page=ListUser");    
            }else
                echo "Password does not match!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modify User</title>
    <link rel="stylesheet" href="../CSS/Style.css">
</head>
<body>
    <form action="" method="POST">
        <table id="userRegistration">
            <tr>
                <th colspan="2" id="userTH">MODIFY USER</th>
            </tr>
            <tr>
                <td>Full name</td>
                <td><input type="fullname" name="fullname" id="fullname" value="<?php echo $row['user_fullname']; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id="email" value="<?php echo $row['user_email']; ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" id="address" style="width: 80%" value="<?php echo $row['user_address']; ?>"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <input type="radio" name="status" id="status" value="1" <?php if($row['user_status']==1) echo "checked"; ?>>Enable
                    <input type="radio" name="status" id="status" value="0" <?php if($row['user_status']==0) echo "checked"; ?>>Disable
                </td>
            </tr>
            <tr>
                <td>Set password</td>
                <td><input type="password" name="password" id="password"> <i>Blank if you don't want to update password</i></td>
            </tr>
            <tr>
                <td>Retype password</td>
                <td><input type="password" name="password2" id="password2"></td>
            </tr>
            <tr id="userRegistration">
                <td colspan="2">
                    <input type="submit" value="Mofify" id="modify" name="modifyBtn">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>