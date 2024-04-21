<?php
include('config.php');

if (isset($_GET['id'])) {
    $userID = $_GET['id'];
    $result = $conn->query("SELECT * FROM cafes WHERE id=$userID");
    $row = $result->fetch_assoc();
    $cafename = $row['cafe_name'];
    $info = $row['info'];
    $location = $row['location'];
    $price = $row['price'];
    $time_open = $row['time_open'];
    $time_close = $row['time_close'];
    $more_info = $row['more_info'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['id'];
    $cafename = $_POST['name'];
    $info = $_POST['info'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $time_open = $_POST['time_open'];
    $time_close = $_POST['time_close'];
    $more_info = $_POST['more_info'];

    $sql = "UPDATE cafes SET cafe_name='$cafename', info='$info', location='$location', price='$price', time_open='$time_open', time_close='$time_close', more_info='$more_info' WHERE id='$userID'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href = 'admin.php'; alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edituser.css">
    <title>แก้ไขข้อมูลคาเฟ่</title>
</head>

<body>
    <h2>แก้ไขข้อมูลคาเฟ่</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $userID; ?>">
        <label for="name">ชื่อคาเฟ่:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $cafename; ?>"><br>
        <label for="info">ข้อมูล:</label><br>
        <textarea id="info" name="info"><?php echo $info; ?></textarea><br>
        <label for="location">ที่ตั้ง:</label><br>
        <input type="text" id="location" name="location" value="<?php echo $location; ?>"><br>
        <label for="price">ราคา:</label><br>
        <input type="text" id="price" name="price" value="<?php echo $price; ?>"><br>
        <label for="time_open">เวลาเปิด:</label><br>
        <input type="text" id="time_open" name="time_open" value="<?php echo $time_open; ?>"><br>
        <label for="time_close">เวลาปิด:</label><br>
        <input type="text" id="time_close" name="time_close" value="<?php echo $time_close; ?>"><br>
        <label for="more_info">ข้อมูลเพิ่มเติม:</label><br>
        <textarea id="more_info" name="more_info"><?php echo $more_info; ?></textarea><br><br>
        <input type="submit" value="บันทึก">
    </form>
</body>

</html>