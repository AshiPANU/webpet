<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Login</title>
    <link rel="stylesheet" href="css/allcafe.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-con">
                <div class="logo">
                    <a href="#">Cutie Pow Cafe</a>
                </div>
                <ul class="menu">
                    <li><a href="mainlogin.php">หน้าหลัก</a></li>
                    <li><a href="#">ดูคาเฟ่ใกล้ฉัน</a></li>
                    <li><a href="booking_form.php">จองรอบ</a></li>
                    <li><a href="mainnolog.php">ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    include('config.php');
    $sql = "SELECT * FROM cafes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='trainer-info'>";
            echo "<div class='profile-picture'>";
            echo "<img src='image/" . $row['image_profile'] . "'>";
            echo "</div>";
            echo "<p><strong>ชื่อคาเฟ่:</strong> " . $row["cafe_name"] . "</p>";
            echo "<p><strong>แนะนำคาเฟ่ของคุณ:</strong> " . $row["info"] . "</p>";
            echo "<p><strong>ที่อยู่ของคาเฟ่:</strong> " . $row["location"] . "</p>";
            echo "<p><strong>ค่าเข้าชม:</strong> " . $row["price"] . "</p>";
            echo "<p><strong>เวลาเปิด-ปิดคาเฟ่:</strong> " . $row["time_open"] . " - " . $row["time_close"] . "</p>";
            echo "<p><strong>ข้อมูลเพิ่มเติม:</strong> " . $row["more_info"] . "</p>";
            
            echo "<button onclick=\"showMessage('" . $row["cafe_name"] . "')\">จอง</button>";
            
            echo "</div>";
        }
    } else {
        echo "<p>ไม่พบข้อมูลคาเฟ่</p>";
    }
    $conn->close();
    ?>

    <script>
        function showMessage(cafe_name) {
            var url = "booking_form.php?cafe_name=" + encodeURIComponent(cafe_name);
            window.open(url, "_blank");
        }
    </script>
</body>
</html>
