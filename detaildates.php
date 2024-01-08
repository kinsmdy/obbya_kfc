<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เมื่อไหร่จะหยุดบัค</title>
</head>

<body>

    <?php

    if (isset($_GET["dates"])) {
        $strdates = $_GET["dates"];
    };

    require "connect.php";
    $sql = "SELECT *
    FROM tbl_orders
    where dates =?";
    $params = array($strdates);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <table border="1">
        <tr>
            <th> orderID </th>
            <td>
                <?php echo $result["orderID"]; ?>
            </td>
        </tr>
        <tr>
            <th> customerID </th>
            <td>
                <?php echo $result["customerID"]; ?>
            </td>
        </tr>
        <tr>
            <th> dates </th>
            <td>
                <?php echo $result["dates"]; ?>
            </td>
        </tr>
        <tr>
            <th> times </th>
            <td>
                <?php echo $result["times"]; ?>
            </td>
        </tr>


    </table>

</body>

</html>