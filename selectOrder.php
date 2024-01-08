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

    $sql = 'SELECT tbl_orders_detail.OrderID,tbl_customer.firstName,tbl_orders.dates,tbl_food.foodName,tbl_menu.menuName,tbl_orders_detail.quantity
    FROM tbl_customer,tbl_menu,tbl_food,tbl_orders,tbl_orders_detail
    where tbl_customer.customerID = tbl_orders.customerID 
    AND tbl_orders.orderID = tbl_orders_detail.OrderID 
    AND tbl_menu.menuID = tbl_food.MenuID 
    AND tbl_orders_detail.foodID = tbl_food.foodID ';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>
    <table border="1">
        <tr>
            <th>OrderID</th>
            <th>firstName</th>
            <th>dates</th>
            <th>foodName</th>
            <th>menuName</th>
            <th>quantity</th>
        </tr>
        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <td>
                    <a href="detailorder.php?OrderID=<?php echo $result["OrderID"]; ?>">
                        <?php echo $result["OrderID"]; ?>
                    </a>
                </td>

                <td>
                    <a href="detailcustomer.php?firstName=<?php echo $result["firstName"]; ?>">
                        <?php echo $result['firstName']; ?>
                    </a>
                </td>

                <td>
                    <a href="detaildates.php?dates=<?php echo $result["dates"]; ?>">
                        <?php echo $result['dates']; ?>
                </td>
                <td>
                    <a href="detailfoodname.php?foodName=<?php echo $result["foodName"]; ?>">
                        <?php echo $result['foodName']; ?>
                    </a>
                </td>
                <td>
                    <a href="detailmenuName.php?menuName=<?php echo $result["menuName"]; ?>">
                        <?php echo $result['menuName']; ?>
                    </a>
                </td>
                <td>
                    <a href="detailquantity.php?quantity=<?php echo $result["quantity"]; ?>">
                        <?php echo $result['quantity']; ?>
                    </a>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>