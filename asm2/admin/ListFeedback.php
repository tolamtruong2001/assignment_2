<?php
    require_once ("DatabaseConnect.php");

    $sql = "SELECT * FROM contact";
    $result = $conn -> query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage user</title>
    <script src="JS/Product_Manage_Script.js"></script>
    <link rel="stylesheet" href="CSS/Product_Manage_Style.css">
</head>
<body>
    <table border="1" id="ListProduct">
        <tr id="ListProductTitle">
            <td colspan="6">LIST FEEDBACK</td>
        </tr>
        <tr>
            <th width="17%">Full name</th>
            <th width="20%">Email</th>
            <th width="10%">Time</th>
            <th width="20%">Title</th>
            <th>Message</th>
            <th width="8%">Edit</th>
        </tr>

        <?php
            if(mysqli_num_rows($result) > 0)
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td><?php echo $row['contact_name']; ?></td>
            <td><?php echo $row['contact_email']; ?></td>
            <td class="tdEdit"><?php echo $row['contact_time']; ?></td>
            <td><?php echo $row['contact_title']; ?></td>
            <td><?php echo $row['contact_message']; ?></td>
            <td class="tdEdit">
                <a href="index.php?page=DeleteFeedback&id=<?php echo $row['contact_id']; ?>">Delete</a>
            </td>
        </tr>

        <?php
            }
        ?>
    </table>
</body>
</html>