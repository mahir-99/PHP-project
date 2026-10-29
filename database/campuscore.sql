CREATE DATABASE IF NOT EXISTS campuscore CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE campuscore;
CREATE TABLE IF NOT EXISTS students (
 id INT AUTO_INCREMENT PRIMARY KEY,
 enrollment_no VARCHAR(30) NOT NULL UNIQUE,
 full_name VARCHAR(100) NOT NULL,
 email VARCHAR(120) NOT NULL,
 phone VARCHAR(15) NOT NULL,
 course VARCHAR(60) NOT NULL,
 semester TINYINT UNSIGNED NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT IGNORE INTO students (enrollment_no,full_name,email,phone,course,semester) VALUES
('BCA2026001','Aarav Shah','aarav@example.com','9876543210','BCA',3),
('BCA2026002','Diya Patel','diya@example.com','9876543211','BCA',2),
('BCA2026003','Rohan Mehta','rohan@example.com','9876543212','BBA',4),
('BCA2026004','Sara Khan','sara@example.com','9876543213','BCA',1);
