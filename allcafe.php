<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Allcafe</title>
  <link rel="stylesheet" href="css/allcafe.css" />
</head>

<body>
  <nav>
    <div class="container">
      <div class="nav-con">
        <div class="logo">
          <a href="#">Cutie Pow Cafe</a>
        </div>
        <ul class="menu">
          <li><a href="mainnolog.php">หน้าหลัก</a></li>
          <li><a href="register.php">ดูคาเฟ่ใกล้ฉัน</a></li>
          <li><a href="register.php">จองรอบ</a></li>
          <li><a href="login.php">เข้าสู่ระบบ</a></li>
          <li><a href="register.php">สมัครสมาชิก</a></li>
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
      echo "</div>";
    }
  } else {
    echo "<p>ไม่พบข้อมูลคาเฟ่</p>";
  }
  $conn->close();
  ?>
</body>

</html>
