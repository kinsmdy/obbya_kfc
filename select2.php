<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เรียกดูข้อมูลselect111</title>
</head>

<body>

    <?php
    require 'connect.php';


    //ทดสอบเรีรยกดูข้อมูลจากฐานข้อมูล แบบ Loop
    $sql = 'select foodID,foodName,foodPrice,foodDescription
    From tbl_food';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<br>" . " รหัสอาหาร : " . $result["foodID"] .
            " ชื่ออาหาร : " . $result["foodName"] .
            " ราคาอาหาร : " . $result["foodPrice"] .
            " รายละเอียดอาหาร : " . $result["foodDescription"];
    }
    ?>
</body>

</html>