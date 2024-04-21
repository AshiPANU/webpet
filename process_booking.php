<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $user_name = $_POST['user_name'];
    $cafe_name = $_POST['cafe_name'];
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];

    // Get user_id from user table
    $sql_user = "SELECT id FROM user WHERE name = '$user_name'";
    $result_user = $conn->query($sql_user);
    if ($result_user->num_rows > 0) {
        $row_user = $result_user->fetch_assoc();
        $user_id = $row_user['id'];

        // Get cafe_id from cafes table
        $sql_cafe = "SELECT id FROM cafes WHERE cafe_name = '$cafe_name'";
        $result_cafe = $conn->query($sql_cafe);
        if ($result_cafe->num_rows > 0) {
            $row_cafe = $result_cafe->fetch_assoc();
            $cafe_id = $row_cafe['id'];

            $sql = "INSERT INTO bookings (user_id, cafe_id, booking_date, booking_time) VALUES ('$user_id', '$cafe_id', '$booking_date', '$booking_time')";
        
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Booking successful'); window.location.href = 'allcafe2.php';</script>";
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Cafe not found";
        }
    } else {
        echo "Error: User not found";
    }
}
?>
