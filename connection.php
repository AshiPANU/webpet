<?php

$conn = mysqli_connect("localhost", "root", "", "petcafe_db");

if (!$conn) {
  $error_message = mysqli_connect_error($conn);
  die("Failed to connect to database: $error_message");
}
?>