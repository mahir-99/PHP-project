# PHP CAPSTONE PROJECT REPORT

## Project title
CampusCore — Student Registration System

**Roll number:** 1  
**Subject:** PHP  
**Institute:** L J Institute of Computer Applications  
**Student name:** __________________  
**Division:** __________________

## 1. Introduction
CampusCore is a small web application for maintaining student registration records. It replaces manual record keeping with a searchable MySQL database and an easy-to-use web interface.

## 2. Objectives
- Add student details such as name, enrollment number, email, phone, course and semester.
- View all registered students.
- Search records quickly.
- Edit student information.
- Delete outdated records.
- Validate inputs and prevent duplicate enrollment numbers.

## 3. Technology used
Core PHP for server-side logic, MySQL for storage, HTML and CSS for pages, Bootstrap for layout, JavaScript for delete confirmation, and XAMPP for the local server.

## 4. Database design
Database: `campuscore`  
Table: `students`

| Field | Type | Purpose |
|---|---|---|
| id | INT, PRIMARY KEY, AUTO_INCREMENT | Unique internal ID |
| enrollment_no | VARCHAR(30), UNIQUE | Student enrollment |
| full_name | VARCHAR(100) | Name |
| email | VARCHAR(120) | Email |
| phone | VARCHAR(15) | Phone |
| course | VARCHAR(60) | Academic program |
| semester | TINYINT | Semester number |
| created_at | TIMESTAMP | Creation time |

## 5. Modules
1. Dashboard: total student count, course count and recent registrations.
2. Registration: adds new students using an HTML form and PHP INSERT query.
3. Student directory: lists and searches records with SELECT queries.
4. Edit: updates a record using UPDATE.
5. Delete: removes a record using DELETE after confirmation.

## 6. Flow of the application
Browser form → PHP receives request → validates input → prepared SQL query → MySQL saves or reads data → PHP renders response.

## 7. Validation and testing
| Test | Expected result |
|---|---|
| Submit valid registration | Record saved and displayed |
| Submit duplicate enrollment | Clear error message |
| Submit invalid email | Form rejects invalid email |
| Search by student name | Matching records shown |
| Edit phone number | New number shown in list |
| Delete student | Record removed |
| Open dashboard | Current counts displayed |

These are **test cases to perform**, not claims that the app was already executed on XAMPP.

## 8. Screenshots to attach after running
1. Dashboard showing statistics.
2. Student registration form.
3. Student directory with sample records.
4. Edit form with populated data.
5. Validation error for duplicate enrollment number.
6. phpMyAdmin `students` table structure and data.

## 9. Conclusion
CampusCore demonstrates the fundamentals of PHP forms, MySQL database connectivity, CRUD operations, basic validation, reusable files, and responsive web design.

## 10. Viva questions (short answers)
**What is PHP?** A server-side scripting language used to build dynamic websites.

**What is MySQL?** A relational database system used to store structured data.

**What is XAMPP?** A local server package containing Apache, MariaDB and PHP.

**What is CRUD?** Create, Read, Update and Delete.

**What does `require` do?** Loads another PHP file; stops if it is missing.

**Why use `mysqli`?** To connect PHP with MySQL and run queries.

**What is `prepare()`?** It creates a parameterized SQL statement.

**Why use `bind_param()`?** It safely passes values to SQL placeholders.

**What is a primary key?** A field that uniquely identifies a row.

**Why UNIQUE on enrollment number?** To prevent two students from sharing one enrollment number.

**What is `$_POST`?** Form data submitted using the POST method.

**What is `$_GET`?** Data passed in the URL query string.

**What is `htmlspecialchars()`?** It escapes text before displaying it in HTML to reduce XSS risk.

**What is `header('Location: ...')`?** It redirects the browser to another page.
