
-- MySQL schema for MindGlow dynamic site
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','member') NOT NULL DEFAULT 'member',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS resources (
  id INT AUTO_INCREMENT PRIMARY KEY,
  type ENUM('articles','videos','podcasts') NOT NULL,
  title VARCHAR(160) NOT NULL,
  description VARCHAR(300) DEFAULT NULL,
  media_url VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS testimonials (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(120) DEFAULT NULL,
  rating TINYINT NOT NULL DEFAULT 5,
  message TEXT NOT NULL,
  approved TINYINT NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL,
  subject VARCHAR(160) DEFAULT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Seed admin (password: admin123)
INSERT IGNORE INTO users (id, name, email, password_hash, role)
VALUES (1, 'Admin', 'admin@mindglow.example', '$2y$10$wPDxZf1Q6LqP8z9D7nJp2u5l4nNQ1UoFf8m8tQm1lRk8M0u.0tK7e', 'admin');

-- Sample resources
INSERT INTO resources (type, title, description, media_url) VALUES
('articles','Quick breathing reset','Reduce stress in the moment.','assets/images/resource-article.svg'),
('videos','5-4-3-2-1 grounding','Focus back to present with senses.','assets/images/resource-video.svg'),
('podcasts','Small wins and progress','Short stories about progress.','assets/images/testimonial.svg');
