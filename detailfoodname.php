<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เมื่อไหร่จะหยุดบัค</title>
</head>

<body>

    <?php

    if (isset($_GET["foodName"])) {
        $strfoodName = $_GET["foodName"];
    };

    require "connect.php";
    $sql = "SELECT *
    FROM tbl_food
    where foodName =?";
    $params = array($strfoodName);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <table border="1">
        <tr>
            <th> foodID </th>
            <td>
                <?php echo $result["foodID"]; ?>
            </td>
        </tr>
        <tr>
            <th> foodName </th>
            <td>
                <?php echo $result["foodName"]; ?>
            </td>
        </tr>
        <tr>
            <th> foodDescription </th>
            <td>
                <?php echo $result["foodDescription"]; ?>
            </td>
        </tr>
        <tr>
            <th> foodPrice </th>
            <td>
                <?php echo $result["foodPrice"]; ?>
            </td>
        </tr>
        <tr>
            <th> MenuID </th>
            <td>
                <?php echo $result["MenuID"]; ?>
            </td>
        </tr>

    </table>

</body>

</html>