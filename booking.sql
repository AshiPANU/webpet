CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    cafe_id INT NOT NULL,
    booking_date DATE NOT NULL,
    booking_time VARCHAR(50) NOT NULL
);
