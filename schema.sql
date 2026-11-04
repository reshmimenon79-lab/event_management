CREATE DATABASE IF NOT EXISTS event_portal;
USE event_portal;

-- Events Table
CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    event_date DATE NOT NULL,
    description TEXT NOT NULL
);

-- Registrations Table
CREATE TABLE IF NOT EXISTS registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    event_title VARCHAR(150) NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin Users Table
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Sample Events
INSERT INTO events (title, event_date, description) VALUES
('Tech Innovation Summit 2026', '2026-11-20', 'Explore emerging tech trends, cloud architectures, and modern web frameworks.'),
('Full-Stack Developer Workshop', '2026-12-05', 'Hands-on crash course on building end-to-end web applications with SQL.'),
('AI & Machine Learning Meetup', '2026-12-15', 'Discussion on real-world AI pipelines and practical implementations.');

-- Default Admin Account (Username: admin, Password: adminpassword)
-- Hash generated using password_hash('adminpassword', PASSWORD_DEFAULT)
INSERT INTO admins (username, password) VALUES
('admin', '$2y$10$wN9Psm9XlJvY4oKkJ45qheWc.R/8oJomxLhT7U8XqQ4v86w9dsqTG')
ON DUPLICATE KEY UPDATE username=username;