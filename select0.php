<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kfc</title>
</head>

<body>
    <?php
    require 'connect.php';

    $sql = 'SELECT foodID,foodName,foodDescription,foodPrice,menuName 
    FROM tbl_food,tbl_menu 
    where tbl_food.menuID = tbl_menu.menuID';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>
    <table border="1">
        <tr>
            <th>รหัสอาหาร</th>
            <th>ชื่ออาหาร</th>
            <th>รายละอียดอาหาร</th>
            <th>ราคาอาหาร</th>
            <th>ชื่อเมนู</th>
        </tr>
        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <td>
                    <a href="detail.php?foodID=<?php echo $result["foodID"]; ?>">
                        <?php echo $result["foodID"]; ?>
                    </a>
                </td>

                <td>
                    <?php echo $result['foodName']; ?>
                </td>

                <td>
                    <?php echo $result['foodDescription']; ?>
                </td>
                <td>
                    <?php echo $result['foodPrice']; ?>
                </td>
                <td>
                    <?php echo $result['menuName']; ?>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>