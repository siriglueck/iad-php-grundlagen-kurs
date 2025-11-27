-- Mini-Blog DB – Schema & Seed
-- Charset & Collation je nach Server ggf. anpassen
CREATE DATABASE IF NOT EXISTS miniblog
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;
USE miniblog;

DROP TABLE IF EXISTS tbl_users;
CREATE TABLE tbl_users (
  users_id INT AUTO_INCREMENT PRIMARY KEY,
  users_forename VARCHAR(50) DEFAULT NULL,
  users_lastname VARCHAR(50),
  users_email VARCHAR(100) UNIQUE,
  users_password VARCHAR(255),
  users_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  users_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

DROP TABLE IF EXISTS tbl_categories;
CREATE TABLE tbl_categories (
  categ_id INT AUTO_INCREMENT PRIMARY KEY,
  categ_name VARCHAR(50),
  categ_desc VARCHAR(225) DEFAULT NULL
) ENGINE=InnoDB;

DROP TABLE IF EXISTS tbl_posts;
CREATE TABLE tbl_posts (
  posts_id INT AUTO_INCREMENT PRIMARY KEY,
  posts_users_id_ref INT,
  posts_categ_id_ref INT, 
  posts_header VARCHAR(50),
  posts_content TEXT,
  posts_image VARCHAR(255) DEFAULT NULL,
  posts_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  posts_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (posts_users_id_ref) REFERENCES tbl_users(users_id),
  FOREIGN KEY (posts_categ_id_ref) REFERENCES tbl_categories(categ_id)
  ) ENGINE=InnoDB;


-- Seed tbl_users
-- Demo-User: admin / admin123 (Bitte Passwort direkt nach Import ändern!)
INSERT INTO tbl_users(users_forename, users_lastname, users_email, users_password) VALUES
('123', 'admin' , 'admin123@miniblog.com', '$2y$10$0mH5QxNHj1l0XnqU.g2UuOx5y6s31YbKkk2m1X5X5aF2w/2GfZx8i');

-- Seed tbl_categories
INSERT INTO tbl_categories(categ_name, categ_desc) VALUES
('Technologie', 'Alles über Technik und Gadgets'),
('Lifestyle', 'Tipps und Geschichten für den Alltag'),
('Reisen', 'Reiseerfahrungen und Guides');


-- Seed tbl_posts
INSERT INTO tbl_posts(posts_users_id_ref, posts_categ_id_ref, posts_header, posts_content, posts_image) VALUES
(1, 1, 'Willkommen im Tech-Blog', 'Dies ist der erste Beitrag über Technologie.', NULL),
(1, 2, 'Tipps für ein gesundes Leben', 'Einige nützliche Tipps für einen gesunden Lebensstil.', NULL),
(1, 3, 'Thailand entdecken', 'Ich teile meine Reiseerfahrungen in Thailand.', NULL);