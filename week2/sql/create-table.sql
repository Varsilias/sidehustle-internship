CREATE TABLE users(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    confirm_password VARCHAR(255)
)