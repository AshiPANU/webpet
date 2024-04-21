<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "config.php";


    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $email_check = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($email_check);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $emailc = $result->fetch_assoc();


    if ($emailc) {
        echo "<script>alert('Email already exists');</script>";
    } else {

        $passwordenc = password_hash($password, PASSWORD_DEFAULT);


        $query = "INSERT INTO user (name, password, email, user_form) VALUES (?, ?, ?, 'user')";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $username, $passwordenc, $email);
        $result = $stmt->execute();


        if ($result) {
            $_SESSION['success'] = "User registered successfully";
            header("Location: login.php");
            exit();
        } else {

            $_SESSION['error'] = "Something went wrong";
            header("Location: register.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>

<div class="formall">

    <form action="" method="post">
        <h3>ลงทะเบียน</h3>
        <input type="text" name="name" required placeholder="ชื่อของคุณ">
        <input type="email" name="email" required placeholder="อีเมลของคุณ">
        <input type="password" name="password" required placeholder="รหัสผ่านของคุณ">
        <input type="submit" value="ลงทะเบียน" class="form-btn">
        <p>มีบัญชีอยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
    </form>
</div>

</body>
</html>



