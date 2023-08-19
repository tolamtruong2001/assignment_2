<?php
    require_once ("DatabaseConnect.php");

    $sql = "SELECT * FROM user";
    $result = $conn -> query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manage user</title>
    <script src="JS/Product_Manage_Script.js"></script>
    <link rel="stylesheet" href="CSS/Product_Manage_Style.css">
</head>
<body>
    <table border="1" id="ListProduct">
        <tr id="ListProductTitle">
            <td colspan="6">LIST USER</td>
        </tr>
        <tr>
            <th width="8%">User ID</th>
            <th width="20%">Full name</th>
            <th width="20%">Email</th>
            <th>Address</th>
            <th width="10%">Status</th>
            <th width="15%">Edit</th>
        </tr>

        <?php
            if(mysqli_num_rows($result) > 0)
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td class="tdEdit"><?php echo $row['user_ID']; ?></td>
            <td><?php echo $row['user_fullname']; ?></td>
            <td><?php echo $row['user_email']; ?></td>
            <td><?php echo $row['user_address']; ?></td>
            <td><?php ($row['user_status']==1)? print "Enable": print "Disable"; ?></td>
            <td class="tdEdit">
                <a href="index.php?page=ModifyUser&id=<?php echo $row['user_ID']; ?>">Edit</a> |
                <a href="index.php?page=DeleteUser&id=<?php echo $row['user_ID']; ?>">Delete</a>
            </td>
        </tr>

        <?php
            }
        ?>
    </table>
</body>
</html>