CREATE DATABASE udemyPlatfom;
DROP DATABASE udemyPlatfom;

USE udemyPlatfom;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(40) NOT NULL,
    lastName VARCHAR(40),
    picture VARCHAR(250),
    email VARCHAR(60) UNIQUE NOT NULL,
    username VARCHAR(60) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'teacher', 'admin') NOT NULL,
    joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    work VARCHAR(30),
    bio TEXT
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    video VARCHAR(255),
    content TEXT,
    cover VARCHAR(255) NOT NULL,
    status ENUM("pending", "active", "draft") NOT NULL DEFAULT "pending",
    category_id INT,
    teacher_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE course_tags (
    course_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (course_id, tag_id),
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    student_id INT NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
);


-- Insert records into users
INSERT INTO users (firstName, lastName, picture, email, username, password, role, work, bio)
VALUES
('Ali', 'Yara', 'https://images.unsplash.com/photo-1502767089025-6572583495d0?crop=entropy&cs=tinysrgb&w=640', 'ali@example.com',"aliyara29", 'password1', 'teacher', 'Web Developer', 'Experienced web developer specializing in React and Laravel.'),
('Sophia', 'Smith', 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?crop=entropy&cs=tinysrgb&w=640', 'sophia@example.com', "sophia", 'password2', 'student', 'Student', 'Learning programming and web development.'),
('John', 'Doe', 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?crop=entropy&cs=tinysrgb&w=640', 'john@example.com', "john", 'password3', 'student', 'Designer', 'Interested in UI/UX design.'),
('Emma', 'Brown', 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?crop=entropy&cs=tinysrgb&w=640', 'emma@example.com', "emma", 'password4', 'admin', 'Manager', 'Oversees platform operations.'),
('Mia', 'Johnson', 'https://images.unsplash.com/photo-1517841905240-472988babdf9?crop=entropy&cs=tinysrgb&w=640', 'mia@example.com', "mia", 'password5', 'teacher', 'Data Scientist', 'Teaches machine learning.'),
('Liam', 'Williams', 'https://images.unsplash.com/photo-1527980965255-d3b416303d12?crop=entropy&cs=tinysrgb&w=640', 'liam@example.com', "liam", 'password6', 'student', 'Engineer', 'Focusing on backend development.'),
('Ava', 'Taylor', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?crop=entropy&cs=tinysrgb&w=640', 'ava@example.com', "ava", 'password7', 'teacher', 'Content Creator', 'Expert in digital marketing.'),
('Noah', 'Jones', 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?crop=entropy&cs=tinysrgb&w=640', 'noah@example.com', "noah", 'password8', 'student', 'Freelancer', 'Aspiring full stack developer.'),
('Olivia', 'Davis', 'https://images.unsplash.com/photo-1552374196-c4e7ffc6e126?crop=entropy&cs=tinysrgb&w=640', 'olivia@example.com', "olivia", 'password9', 'student', 'Writer', 'Exploring creative writing and storytelling.'),
('James', 'Anderson', 'https://images.unsplash.com/photo-1511367461989-f85a21fda167?crop=entropy&cs=tinysrgb&w=640', 'james@example.com', "james", 'password10', 'teacher', 'Photographer', 'Sharing tips on professional photography.');

-- Insert records into categories
INSERT INTO categories (name) 
VALUES 
('Web Development'), 
('Data Science'), 
('UI/UX Design'), 
('Photography'), 
('Digital Marketing');

-- Insert records into courses
INSERT INTO courses (title, slug, description, content, cover, status, category_id, teacher_id)
VALUES
('Learn React Basics', 'learn-react-basics', 'A comprehensive course on React for beginners.', 'Detailed React lessons.', 'https://unsplash.com/photos/a-womans-hand-casting-a-shadow-on-a-white-shirt-Mcevta-MCXw', 'active', 1, 1),
('Master Data Science', 'master-data-science', 'An advanced course for mastering data science concepts.', 'Data cleaning, visualization, and machine learning.', 'https://unsplash.com/photos/a-purple-vase-with-two-purple-flowers-in-it-BOa6aiwEMrc', 'active', 2, 5),
('UI/UX Design Essentials', 'uiux-design-essentials', 'Essential skills for becoming a great designer.', 'Learn Figma, prototyping, and more.', 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?crop=entropy&cs=tinysrgb&w=640', 'active', 3, 3);

-- Insert records into tags
INSERT INTO tags (name) 
VALUES 
('React'), 
('JavaScript'), 
('CSS'), 
('Data Science'), 
('Machine Learning'), 
('UI/UX'), 
('Design'), 
('Photography'), 
('Marketing');

-- Insert records into course_tags
INSERT INTO course_tags (course_id, tag_id)
VALUES
(1, 1), -- React for Learn React Basics
(1, 2), -- JavaScript for Learn React Basics
(2, 4), -- Data Science for Master Data Science
(2, 5), -- Machine Learning for Master Data Science
(3, 6), -- UI/UX for UI/UX Design Essentials
(3, 7); -- Design for UI/UX Design Essentials

-- Insert records into enrollments
INSERT INTO enrollments (student_id, course_id)
VALUES
(2, 1), -- Sophia enrolled in Learn React Basics
(3, 1), -- John enrolled in Learn React Basics
(6, 2), -- Liam enrolled in Master Data Science
(9, 3); -- Olivia enrolled in UI/UX Design Essentials

-- Insert records into comments
INSERT INTO comments (course_id, student_id, content)
VALUES
(1, 2, 'This course is amazing! I finally understand React.'),
(1, 3, 'Great content but could use more examples.'),
(2, 6, 'The data science material is thorough and detailed.'),
(3, 9, 'Perfect course for anyone starting in UI/UX design!');