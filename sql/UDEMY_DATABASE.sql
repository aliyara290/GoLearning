CREATE DATABASE udemyPlatfom;

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
    status ENUM('active', 'suspended', 'pending'),
    joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    work VARCHAR(30),
    bio TEXT
);

ALTER TABLE users ADD COLUMN website VARCHAR(100);


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

INSERT INTO users (firstName, lastName, picture, email, username, password, role, status, work, bio) VALUES
('Sara', 'Benali', 'https://source.unsplash.com/100x100/?face,woman', 'sara.benali@example.com', 'sarabenali', 'hashedpassword2', 'teacher', 'active', 'Software Engineer', 'Passionate about teaching and learning new technologies.'),
('Mohamed', 'El Mansouri', 'https://source.unsplash.com/100x100/?face,man', 'mohamed.elmansouri@example.com', 'mohamedmansouri', 'hashedpassword3', 'student', 'active', 'Computer Science Student', 'Aspiring developer interested in AI and blockchain.'),
('Fatima', 'Zahra', 'https://source.unsplash.com/100x100/?face,woman', 'fatima.zahra@example.com', 'fatimazahra', 'hashedpassword4', 'student', 'pending', 'Web Designer', 'Creative designer with a passion for modern UI/UX.'),
('Youssef', 'Haddad', 'https://source.unsplash.com/100x100/?face,man', 'youssef.haddad@example.com', 'youssefhaddad', 'hashedpassword5', 'teacher', 'active', 'Data Scientist', 'Data enthusiast exploring machine learning techniques.'),
('Asmae', 'El Khalfi', 'https://source.unsplash.com/100x100/?face,woman', 'asmae.elkhalfi@example.com', 'asmaekhalfi', 'hashedpassword6', 'student', 'active', 'Mobile Developer', 'Building apps for Android and iOS platforms.'),
('Karim', 'Boukhari', 'https://source.unsplash.com/100x100/?face,man', 'karim.boukhari@example.com', 'karimboukhari', 'hashedpassword7', 'student', 'suspended', 'DevOps Engineer', 'Streamlining CI/CD pipelines for web applications.'),
('Laila', 'Naji', 'https://source.unsplash.com/100x100/?face,woman', 'laila.naji@example.com', 'lailanaji', 'hashedpassword8', 'student', 'active', 'Intern', 'Learning web development and cloud technologies.'),
('Omar', 'Hassan', 'https://source.unsplash.com/100x100/?face,man', 'omar.hassan@example.com', 'omarhassan', 'hashedpassword9', 'teacher', 'active', 'Cybersecurity Expert', 'Helping companies secure their digital infrastructure.'),
('Rania', 'Mehdi', 'https://source.unsplash.com/100x100/?face,woman', 'rania.mehdi@example.com', 'raniamehdi', 'hashedpassword10', 'student', 'pending', 'Game Developer', 'Creating immersive gaming experiences.'),
('Hassan', 'El Amrani', 'https://source.unsplash.com/100x100/?face,man', 'hassan.elamrani@example.com', 'hassanelamrani', 'hashedpassword11', 'teacher', 'pending', 'Mathematics Teacher', 'Passionate about teaching mathematics and solving complex problems.'),
('Noura', 'Cherkaoui', 'https://source.unsplash.com/100x100/?face,woman', 'noura.cherkaoui@example.com', 'nouracherkaoui', 'hashedpassword12', 'teacher', 'pending', 'Physics Teacher', 'Dedicated to making physics concepts engaging and accessible.'),
('Anas', 'Bouhadi', 'https://source.unsplash.com/100x100/?face,man', 'anas.bouhadi@example.com', 'anasbouhadi', 'hashedpassword13', 'teacher', 'pending', 'History Teacher', 'Sharing a love for history and cultural heritage with students.'),
('Siham', 'Oubella', 'https://source.unsplash.com/100x100/?face,woman', 'siham.oubella@example.com', 'sihamoubella', 'hashedpassword14', 'teacher', 'pending', 'Art Teacher', 'Inspiring creativity through art and design lessons.'),
('Younes', 'Karimi', 'https://source.unsplash.com/100x100/?face,man', 'younes.karimi@example.com', 'youneskarimi', 'hashedpassword15', 'teacher', 'pending', 'Computer Science Teacher', 'Helping students master programming and computational thinking.');

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



INSERT INTO courses (title, slug, description, video, content, cover, status, category_id, teacher_id) VALUES
('Introduction to Web Development', 'introduction-to-web-development', 'Learn the basics of HTML, CSS, and JavaScript to kickstart your web development journey.', 'https://example.com/videos/web-development.mp4', 'Comprehensive guide to modern web development.', 'https://source.unsplash.com/600x400/?technology,web', 'active', 1, 2),
('Mastering Python Programming', 'mastering-python-programming', 'Dive deep into Python programming with practical examples and projects.', 'https://example.com/videos/python.mp4', 'Step-by-step guide to Python.', 'https://source.unsplash.com/600x400/?python,programming', 'active', 2, 2),
('Fundamentals of Machine Learning', 'fundamentals-of-machine-learning', 'Understand the core concepts of machine learning and its applications.', 'https://example.com/videos/machine-learning.mp4', 'Introductory material on ML.', 'https://source.unsplash.com/600x400/?machine-learning,ai', 'pending', 3, 2),
('Creative Graphic Design', 'creative-graphic-design', 'Learn the art of graphic design with practical tools like Photoshop and Illustrator.', 'https://example.com/videos/graphic-design.mp4', 'Creative tips and tricks for graphic design.', 'https://source.unsplash.com/600x400/?design,creative', 'draft', 4, 2),
('Building RESTful APIs with Laravel', 'building-restful-apis-with-laravel', 'Master API development using the Laravel framework.', 'https://example.com/videos/laravel.mp4', 'Detailed course on API building.', 'https://source.unsplash.com/600x400/?laravel,php', 'active', 5, 2),
('Data Visualization with Tableau', 'data-visualization-with-tableau', 'Learn to create compelling data visualizations with Tableau.', 'https://example.com/videos/tableau.mp4', 'Guidance on using Tableau effectively.', 'https://source.unsplash.com/600x400/?data,visualization', 'pending', 2, 2),
('React.js for Beginners', 'reactjs-for-beginners', 'Get started with React.js to create dynamic web applications.', 'https://example.com/videos/react.mp4', 'Comprehensive guide to React basics.', 'https://source.unsplash.com/600x400/?react,web', 'active', 1, 2),
('Advanced CSS Techniques', 'advanced-css-techniques', 'Explore advanced CSS concepts to create stunning web designs.', 'https://example.com/videos/css.mp4', 'In-depth guide on advanced CSS.', 'https://source.unsplash.com/600x400/?css,web-design', 'draft', 1, 2),
('Introduction to DevOps', 'introduction-to-devops', 'Understand DevOps principles and practices to streamline software development.', 'https://example.com/videos/devops.mp4', 'Beginner-friendly guide to DevOps.', 'https://source.unsplash.com/600x400/?devops,technology', 'pending', 3, 2),
('Cloud Computing Basics', 'cloud-computing-basics', 'Learn the fundamentals of cloud computing and its applications.', 'https://example.com/videos/cloud-computing.mp4', 'Introductory material on cloud computing.', 'https://source.unsplash.com/600x400/?cloud,computing', 'active', 4, 2);


INSERT INTO course_tags (course_id, tag_id)
VALUES
(7, 1), -- Web Development for Introduction to Web Development
(7, 2), -- JavaScript for Introduction to Web Development
(8, 4), -- Data Science for Mastering Python Programming
(8, 5), -- Machine Learning for Mastering Python Programming
(9, 5), -- Machine Learning for Fundamentals of Machine Learning
(9, 4), -- Data Science for Fundamentals of Machine Learning
(10, 6), -- UI/UX for Creative Graphic Design
(10, 7), -- Design for Creative Graphic Design
(11, 3), -- Programming for Building RESTful APIs with Laravel
(11, 1), -- Web Development for Building RESTful APIs with Laravel;
(12, 1), -- Web Development for Data Visualization with Tableau
(12, 4), -- Data Science for Data Visualization with Tableau
(12, 6), -- UI/UX for Data Visualization with Tableau
(13, 1), -- Web Development for React.js for Beginners
(13, 2), -- JavaScript for React.js for Beginners
(14, 2), -- JavaScript for Advanced CSS Techniques
(14, 6), -- UI/UX for Advanced CSS Techniques
(15, 3), -- Programming for Introduction to DevOps
(15, 1), -- Web Development for Introduction to DevOps
(16, 4), -- Data Science for Cloud Computing Basics
(16, 3); -- Programming for Cloud Computing Basics