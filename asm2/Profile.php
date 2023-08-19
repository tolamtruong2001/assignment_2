<?php
    if(isset($_SESSION['user'])){
        require_once("admin/DatabaseConnect.php");
        $id = $_SESSION['user']['user_ID'];
        
        $sql = "SELECT * FROM user WHERE user_ID='$id'";
        $result = $conn -> query($sql);
        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User profile</title>
</head>
<body>
    <table width="50%">
        <tr>
            <th colspan="2">
                YOUR PROFILE
            </th>
        </tr>
        <tr>
            <td>
                Username:
            </td>
            <td>
                <?php echo $row['user_fullname']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <?php echo $row['user_email']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Phone number:
            </td>
            <td>
                <?php echo $row['user_phonenumber']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Address:
            </td>
            <td>
                <?php echo $row['user_address']; ?>
            </td>
        </tr>
        <tr id="userRegistration">
            <td colspan="2">
                <button><a href="index.php?page=ModifyProfile">Modify</a></button>
            </td>
        </tr>
    </table>
</body>
</html>