CREATE TABLE cafes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cafe_name VARCHAR(255) NOT NULL,
    info TEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    time_open TIME NOT NULL,
    time_close TIME NOT NULL,
    more_info TEXT NOT NULL,
    image_profile VARCHAR(255) NOT NULL
);
