<?php
include('config.php');

if(isset($_GET['delete_id'])) {
    $userID = $_GET['delete_id'];
    
    $sql = "DELETE FROM user WHERE id=$userID";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('ลบผู้ใช้เรียบร้อยแล้ว');</script>";
        header("Location: admin.php");
        exit;
    } else {
        echo "เกิดข้อผิดพลาดในการลบผู้ใช้: " . $conn->error;
    }
}
if(isset($_GET['delete_cafeid'])) {
    $cafeID = $_GET['delete_cafeid'];
    
    $sql = "DELETE FROM cafes WHERE id=$cafeID";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('ลบคาเฟ่เรียบร้อยแล้ว');</script>";
        header("Location: admin.php");
        exit; // หยุดการทำงานของสคริปต์
    } else {
        echo "เกิดข้อผิดพลาดในการลบคาเฟ่: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/allcafe.css">
    <title>Admin - รายการผู้ใช้</title>
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-con">
                <div class="logo">
                    <a href="#">Cutie Pow Cafe</a>
                </div>
                <ul class="menu">
                    <li><a href="admin.php">หน้าหลัก</a></li>
                    <li><a href="#">ดูคาเฟ่ใกล้ฉัน</a></li>
                    <li><a href="booking_form.php">จองรอบ</a></li>
                    <li><a href="adminadd.php">เพิ่มข้อมูลของคาเฟ่</a></li>
                    <li><a href="mainnolog.php">ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <h2>รายการผู้ใช้</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ชื่อ</th>
            <th>อีเมล</th>
            <th>Role</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>
        <?php
        include('config.php');
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['user_form']."</td>";
                echo "<td><a href='edit_user.php?id=".$row['id']."'>แก้ไข</a></td>";
                echo "<td><a href='?delete_id=".$row['id']."' onclick='return confirm(\"คุณต้องการลบผู้ใช้รายนี้หรือไม่?\")'>ลบ</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>ไม่พบข้อมูลผู้ใช้</td></tr>";
        }
        ?>

</table>
    <h2>รายการคาเฟ่</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ชื่อคาเฟ่</th>
            <th>แนะนำคาเฟ่ของคุณ</th>
            <th>ที่อยู่ของคาเฟ่</th>
            <th>ค่าเข้าชม</th>
            <th>เวลาเปิดคาเฟ่</th>
            <th>เวลาปิดคาเฟ่</th>
            <th>เพิ่มเติมจากคาเฟ่</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>
        <?php
        include('config.php');
        $sql = "SELECT * FROM cafes";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['cafe_name'] . "</td>";
                echo "<td>" . $row['info'] . "</td>";
                echo "<td>" . $row['location'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['time_open'] . "</td>";
                echo "<td>" . $row['time_close'] . "</td>";
                echo "<td>" . $row['more_info'] . "</td>";
                echo "<td><a href='edit_cafe.php?id=" . $row['id'] . "'>แก้ไข</a></td>";
                echo "<td><a href='?delete_cafeid=".$row['id']."' onclick='return confirm(\"คุณต้องการลบผู้ใช้รายนี้หรือไม่?\")'>ลบ</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>ไม่พบข้อมูลผู้ใช้</td></tr>";
        }
        ?>
    <h2>รายชื่อคนจอง</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ชื่อที่จอง</th>
            <th>แนะนำคาเฟ่ของคุณ</th>
            <th>ที่อยู่ของคาเฟ่</th>
            <th>ค่าเข้าชม</th>
            <th>เวลาเปิดคาเฟ่</th>
            <th>เวลาปิดคาเฟ่</th>
            <th>เพิ่มเติมจากคาเฟ่</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>
</body>

</html>
    </table>
</body>
</html>
