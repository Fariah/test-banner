CREATE DATABASE IF NOT EXISTS test_banner;
USE test_banner;

CREATE TABLE IF NOT EXISTS visitors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(45) NOT NULL,
    user_agent VARCHAR(255) NOT NULL,
    view_date DATETIME NOT NULL,
    page_url VARCHAR(255) NOT NULL,
    views_count INT NOT NULL
);