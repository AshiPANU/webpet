<?php
include('config.php');

if(isset($_GET['id'])) {
    $userID = $_GET['id'];
    
    $result = $conn->query("SELECT * FROM user WHERE id=$userID");
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
    $user = $row['user_form'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $_POST['user_form'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "UPDATE user SET name='$name', email='$email', password='$hashed_password', user_form='$user' WHERE id=$userID";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href = 'admin.php'; alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
        } else {
            echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edituser.css">
    <title>แก้ไขข้อมูลผู้ใช้</title>
</head>
<body>
    <h2>แก้ไขข้อมูลผู้ใช้</h2>
    <form method="post">
        <label for="name">ชื่อ:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>
        <label for="email">อีเมล:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>
        <label for="password">รหัสผ่านใหม่:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <label for="user_form">เปลี่ยน Role:</label><br>
        <select id="role" name="user_form">
            <option value="user" <?php if($user == 'user') echo 'selected'; ?>>user</option>
            <option value="petcafe" <?php if($user == 'petcafe') echo 'selected'; ?>>petcafe</option>
            <option value="admin" <?php if($user == 'admin') echo 'selected'; ?>>admin</option>
        </select><br><br>
        <input type="submit" value="บันทึก">
    </form>
</body>
</html>
