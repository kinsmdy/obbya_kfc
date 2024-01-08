<html>

<head>
    <title>User Registration11</title>
</head>

<body>
    <h1>Add foodID</h1>



    <form action="addfoodIDkfc.php" method="POST">
        <input type="text" placeholder="Enter foodID" name="foodID">
        <br> <br>
        <input type="text" placeholder="foodName" name="foodName">
        <br> <br>
        <input type="text" placeholder="foodDescripton" name="foodDescripton">
        <br> <br>
        <input type="text" placeholder="foodPrice" name="foodPrice">
        <br> <br>
        <input type="text" placeholder="Enter Menu ID" name="MenuID">
        <br> <br>
        <input type="submit">
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
        $sql = "insert into tbl_food values(:foodID, :foodName, :foodDescripton, :foodPrice,
            :MenuID)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':foodID', $_POST['foodID']);
        $stmt->bindParam(':foodName', $_POST['foodName']);
        $stmt->bindParam(':foodDescripton', $_POST['foodDescripton']);
        $stmt->bindParam(':foodPrice', $_POST['foodPrice']);
        $stmt->bindParam(':MenuID', $_POST['MenuID']);

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