-- Database Name: interior_mis_db

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'sub-admin') NOT NULL DEFAULT 'sub-admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    category ENUM('ongoing', 'completed') NOT NULL,
    image_path VARCHAR(255),
    completion_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100) NOT NULL,
    review_text TEXT NOT NULL,
    rating TINYINT CHECK (rating BETWEEN 1 AND 5),
    client_image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE success_stories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    before_image VARCHAR(255) NOT NULL,
    after_image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE inquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    contact_info VARCHAR(100),
    message TEXT,
    source ENUM('website_form', 'chatbot') DEFAULT 'website_form',
    status ENUM('new', 'contacted', 'closed') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE daily_progress (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_date DATE NOT NULL,
    details TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default Admin User (Password: admin123) - You should hash this in a real app
-- For demonstration, inserting a cleartext password is bad practice, but usually users hash via PHP script.
-- Here we'll just insert a placeholder user. The PHP code will handle hashing verification (using password_verify).
-- Let's assume the user will create the first admin via a script or we provide a pre-hashed 'admin123'
-- Hash for 'admin123' (bcrypt): $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi
INSERT INTO users (username, password, role) VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');
