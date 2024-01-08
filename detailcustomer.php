<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เมื่อไหร่จะหยุดบัค</title>
</head>

<body>

    <?php

    if (isset($_GET["firstName"])) {
        $strfirstName = $_GET["firstName"];
    };

    require "connect.php";
    $sql = "SELECT *
    FROM tbl_customer
    where firstName =?";
    $params = array($strfirstName);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <table border="1">
        <tr>
            <th> customerID </th>
            <td>
                <?php echo $result["customerID"]; ?>
            </td>
        </tr>
        <tr>
            <th> firstName </th>
            <td>
                <?php echo $result["firstName"]; ?>
            </td>
        </tr>
        <tr>
            <th> surName </th>
            <td>
                <?php echo $result["surname"]; ?>
            </td>
        </tr>
        <tr>
            <th> houseNo </th>
            <td>
                <?php echo $result["houseNo"]; ?>
            </td>
        </tr>
        <tr>
            <th> subDistrict </th>
            <td>
                <?php echo $result["subDistrict"]; ?>
            </td>
        </tr>
        <tr>
            <th> district </th>
            <td>
                <?php echo $result["district"]; ?>
            </td>
        </tr>
        <tr>
            <th> province </th>
            <td>
                <?php echo $result["province"]; ?>
            </td>
        </tr>
        <tr>
            <th> zipcode </th>
            <td>
                <?php echo $result["zipcode"]; ?>
            </td>
        </tr>

    </table>

</body>

</html>