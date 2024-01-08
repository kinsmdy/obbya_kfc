<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เมื่อไหร่จะหยุดบัค</title>
</head>

<body>

    <?php

    if (isset($_GET["menuName"])) {
        $strmenuName = $_GET["menuName"];
    };

    require "connect.php";
    $sql = "SELECT *
    FROM tbl_menu
    where menuName =?";
    $params = array($strmenuName);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <table border="1">
        <tr>
            <th> menuID </th>
            <td>
                <?php echo $result["menuID"]; ?>
            </td>
        </tr>
        <tr>
            <th> menuName </th>
            <td>
                <?php echo $result["menuName"]; ?>
            </td>
        </tr>


    </table>

</body>

</html>