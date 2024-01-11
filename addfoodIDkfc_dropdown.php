<?php
require 'connect.php';

$sqi_select = "SELECT * From tbl_menu order by menuID";
$stmt_s = $conn->prepare($sqi_select);
$stmt_s->execute();
?>
<html>

<head>
    <title>User Registration11</title>
</head>

<body>
    <h1>Add food_dropdown</h1>



    <form action="addfoodIDkfc_dropdown.php" method="POST">
        <input type="text" placeholder="Enter foodID" name="foodID">
        <br> <br>
        <input type="text" placeholder="foodName" name="foodName">
        <br> <br>
        <input type="text" placeholder="foodDescription" name="foodDescription">
        <br> <br>
        <input type="text" placeholder="foodPrice" name="foodPrice">
        <br> <br>

        <label>menu </label>
        <select name="menuID">
            <?php
            while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) :;
            ?>
                <option value="<?php echo $cc["menuID"]; ?>">
                    <?php echo $cc["menuName"]; ?>
                </option>
            <?php
            endwhile;
            ?>
        </select>
        <br> <br>
        <input type="submit">
    </form>
    </form>
</body>

</html>

<?php

try {

    if (isset($_POST['foodID']) && isset($_POST['foodName'])) :
        // echo "<br>" . $_POST['fooodID'] . $_POST['foodName'] . $_POST['foodDescripton'] . $_POST['foodPrice'] .
        //     $_POST['MenuID'] . $_POST['outstandingDebt'];

        require 'connect.php';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_food values(:foodID, :foodName, :foodDescription, :foodPrice,
            :menuID)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':foodID', $_POST['foodID']);
        $stmt->bindParam(':foodName', $_POST['foodName']);
        $stmt->bindParam(':foodDescription', $_POST['foodDescription']);
        $stmt->bindParam(':foodPrice', $_POST['foodPrice']);
        $stmt->bindParam(':menuID', $_POST['menuID']);

        if ($stmt->execute()) :
            $message = 'Suscessfully add new foodID';
        else :
            $message = 'Fail to add new foodID';
        endif;
        echo $message;

        $conn = null;
    endif;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>