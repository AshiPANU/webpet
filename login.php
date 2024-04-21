<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "config.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_form'] = $user['user_form'];
            if ($user['user_form'] == 'admin') {
                header("Location: admin.php");
            } elseif ($user['user_form'] == 'petcafe') {
                header("Location: petcafe.php");
            } else {
                header("Location: mainlogin.php");
            }
            exit();
        } else {
            $error_message = "Invalid email or password";
        }
    } else {
        $error_message = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>

<div class="formall">
    <form action="" method="post">
        <h3>เข้าสู่ระบบ</h3>
        <?php if(isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>
        <input type="email" name="email" required placeholder="อีเมลของคุณ">
        <input type="password" name="password" required placeholder="รหัสผ่านของคุณ">
        <input type="submit" value="เข้าสู่ระบบ" class="form-btn">
        <p>ไม่มีบัญชี?<a href="register.php">สมัครสมาชิก</a></p>
    </form>
</div>
    
</body>
</html>
