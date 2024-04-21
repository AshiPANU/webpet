<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/petcafe.css">
</head>
<body>
    <div class="wrapper">
        <i class='bx bxs-x-square' style='color:#ff0000'></i>
        <h1>เพิ่มข้อมูลของคาเฟ่</h1>
        <form action="submit_cafe.php" method="POST" enctype="multipart/form-data">
            <div class="input-box">
                <p>กรุณาใส่ข้อมูล</p>
                <input type="text" name="cafe_name" placeholder="ชื่อคาเฟ่" required>
                <input type="text" name="info" placeholder="แนะนำคาเฟ่ของคุณ" required>
                <input type="text" name="location" placeholder="ที่อยู่ของคาเฟ่" required>
                <input type="number" name="price" placeholder="ค่าเข้าชม" required>
                <label for="timecafe">เวลาเปิด-ปิดคาเฟ่</label>
                <input type="time" name="time1">
                <input type="time" name="time2">
                <input type="text" name="more" placeholder="เพิ่มเติมจากคาเฟ่" required>
            </div>
            <div class="form-group">
                <label for="image">รูปของคาเฟ่</label>
                <input type="file" class="form-control" id="image_proflie" name="image_profile" accept="image/*">
                <button type="submit" class="btnth">ส่งข้อมูลคาเฟ่</button>
                <button type="button" class="btnth" onclick="history.back()" style="padding = 10px">ย้อนกลับ</button>
            </div>
        </form>
    </div>
</body>
</html>
