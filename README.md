# GoLearning - Online Course Platform

GoLearning is an online learning platform designed to offer an interactive and personalized educational experience for both students and teachers. The platform includes a wide range of features tailored for different user roles to ensure a seamless learning process.

## Main Features

### Front Office:

#### Visitor:
- Access to the course catalog with pagination.
- Search for courses using keywords.
- Create an account and choose a role (Student or Teacher).

#### Student:
- Browse the course catalog.
- Search and view detailed course information (description, content, instructor, etc.).
- Enroll in courses after authentication.
- Access the "My Courses" section to view enrolled courses.

#### Teacher:
- Add new courses with details such as:
  - Title, description, content (video or document), tags, and category.
- Manage courses:
  - Modify, delete, and view student enrollments.
- View course statistics:
  - Number of students enrolled, total courses, etc.

### Back Office:

#### Administrator:
- Validate teacher accounts.
- Manage users:
  - Activate, suspend, or delete user accounts.
- Manage content:
  - Courses, categories, and tags.
- Bulk insertion of tags for efficiency.
- View global statistics:
  - Total number of courses, category distribution, top 3 teachers, most popular courses, etc.

### Cross-functional Features:
- Courses can have multiple tags (many-to-many relationship).
- Polymorphism applied for course creation and display.
- Authentication and authorization system for secure routes and data.
- Role-based access control: each user can only access features corresponding to their role.

## Technical Requirements:
- Object-Oriented Programming (OOP) principles:
  - Encapsulation, inheritance, polymorphism.
- Relational database with relationship management (one-to-many, many-to-many).
- PHP sessions for managing logged-in users.
- Input validation to ensure security and integrity.

### Bonus Features:
- Advanced course search with filters (category, tags, author).
- Detailed statistics:
  - Engagement rate, most popular categories, etc.
- Notification system for:
  - Teacher account validation and course enrollment confirmation.
- Comment and rating system for courses.
- PDF certificate generation for students upon course completion.

## Setup Instructions

### Clone the Repository:
```bash
git clone https://github.com/aliyara290/GoLearning.git
