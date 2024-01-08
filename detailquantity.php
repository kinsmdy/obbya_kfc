<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เมื่อไหร่จะหยุดบัค</title>
</head>

<body>

    <?php

    if (isset($_GET["quantity"])) {
        $strquantity = $_GET["quantity"];
    };

    require "connect.php";
    $sql = "SELECT *
    FROM tbl_orders_detail
    where quantity =?";
    $params = array($strquantity);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <table border="1">
        <tr>
            <th> orderID </th>
            <td>
                <?php echo $result["OrderID"]; ?>
            </td>
        </tr>
        <tr>
            <th> foodID </th>
            <td>
                <?php echo $result["foodID"]; ?>
            </td>
        </tr>
        <tr>
            <th> quantity </th>
            <td>
                <?php echo $result["quantity"]; ?>
            </td>
        </tr>
    </table>

</body>

</html>