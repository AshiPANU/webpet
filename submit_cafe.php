<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cafe_name = $_POST['cafe_name'];
    $info = $_POST['info'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $time_open = $_POST['time1'];
    $time_close = $_POST['time2'];
    $more_info = $_POST['more'];

    if (!empty($_FILES['image_profile']['name'])) {
        $image_profile = $_FILES['image_profile']['name'];
        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES["image_profile"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image_profile"]["tmp_name"]);
        if($check !== false) {
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "<script>alert('ขออภัย, อนุญาตเฉพาะไฟล์ JPG, JPEG, PNG เท่านั้น'); window.location.href = 'cafeadd.php';</script>";
            } else {
                if (move_uploaded_file($_FILES["image_profile"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO cafes (cafe_name, info, location, price, time_open, time_close, more_info, image_profile) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssssss", $cafe_name, $info, $location, $price, $time_open, $time_close, $more_info, $image_profile);
                    if ($stmt->execute()) {
                        echo "<script>alert('บันทึกข้อมูลคาเฟ่เรียบร้อยแล้ว'); window.location.href = 'petcafe.php';</script>";
                    } else {
                        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');</script>";
                    }
                    $stmt->close();
                } else {
                    echo "<script>alert('อัปโหลดไฟล์รูปภาพไม่สำเร็จ');</script>";
                }
            }
        } else {
            echo "<script>alert('ไฟล์ที่อัปโหลดไม่ใช่รูปภาพ'); window.location.href = 'cafeadd.php';</script>";
        }
    } else {
        echo "<script>alert('กรุณาใส่รูปภาพ'); window.location.href = 'cafeadd.php';</script>";
    }
}
?>

