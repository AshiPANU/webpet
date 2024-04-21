<?php
include('config.php');

$sql = "SELECT * FROM cafes LIMIT 3";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Login</title>

    <link rel="stylesheet" href="css/styie.css">
</head>

<body>

    <nav>
        <div class="container">
            <div class="nav-con">
                <div class="logo">
                    <a href="#">Cutie Pow Cafe</a>
                </div>
                <ul class="menu">
                    <li><a href="#">ดูคาเฟ่ใกล้ฉัน</a></li>
                    <li><a href="booking_form.php">จองรอบ</a></li>
                    <li><a href="mainnolog.php">ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container">
            <div class="hero-con">
                <div class="hero-info">
                    <h3>เว็บของเราคือ</h3>
                    <p>เว็บของเราสร้างขึ้นเพื่อรวบรวมร้านคาเฟ่สัตว์เลี้ยงที่อยู่ในกรุงเทพมหานครฯ เพื่อให้ค้นหาคาเฟ่ได้สะดวก และ ยังสามารถดูคาเฟ่ที่อยู่ใกล้ตัวได้อีกด้วย</p>
                    <a href="#" class="hero-btn">ค้นหาCafeใกล้ฉัน</a>
                </div>

                <div class="hero-img">
                    <img src="https://images.unsplash.com/photo-1450778869180-41d0601e046e?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGV0c3xlbnwwfHwwfHx8MA%3D%3D"
                        alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container">
            <div class="blog-title">
                <h3>คาเฟ่แนะนำ</h3>
            </div>
            <div class="blog-con">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="blog-item">
                            <img src="image/<?php echo $row['image_profile']; ?>" alt="">
                            <h4><?php echo $row['cafe_name']; ?></h4>
                            <p><?php echo $row['info']; ?></p>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="blog-item">
                    <div class="a1">
                        <a href="allcafe2.php" class="aa">ดูคาเฟ่ทั้งหมด</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

<?php
$conn->close();
?>
