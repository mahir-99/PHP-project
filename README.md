# CampusCore — Student Registration System

**Assigned to roll number 1** in the PHP Capstone Project Allotment PDF.

## Quick setup with XAMPP
1. Extract the ZIP. Copy the `campuscore` folder to `C:\xampp\htdocs\` (Windows).
2. Start **Apache** and **MySQL** in the XAMPP Control Panel.
3. Visit `http://localhost/phpmyadmin` and select the **Import** tab.
4. Choose `campuscore/database/campuscore.sql` and click **Import**. This creates the database, table and sample students.
5. Visit `http://localhost/campuscore/` in your browser.
6. If your MySQL root password is not empty, edit `includes/db.php`.

**Requires:** PHP 8.0+, MySQL/MariaDB, Apache. Bootstrap and Google Fonts load from the internet; the core app works offline but may have simpler styling without the CDN.

## Files
- `index.php`: dashboard, total students, courses and recent students.
- `students.php`: list and search records.
- `form.php`: register and edit students with validation.
- `delete.php`: remove a student using a POST form.
- `includes/db.php`: MySQL connection.
- `includes/functions.php`: HTML escaping and validation.
- `includes/header.php`, `footer.php`: shared layout.
- `assets/style.css`: design.
- `assets/app.js`: delete confirmation.
- `database/campuscore.sql`: database export with sample records.
- `docs/PROJECT_REPORT.md`: project report and viva preparation.

## How CRUD works
**Create:** form.php runs INSERT. **Read:** index.php and students.php run SELECT. **Update:** form.php runs UPDATE. **Delete:** delete.php runs DELETE.

## Demo checklist
- Register a new student and see it in All Students.
- Search for the student by name or enrollment number.
- Edit the course or phone number.
- Delete the student and confirm it disappears.
- Try duplicate enrollment number to show validation.

## Notes
- Sample data is fictional and may be deleted.
- This is a local educational application, not a production student-information system. It has no authentication or role permissions. Do not expose it publicly with real personal data.
- Screenshots must be taken after running the project in XAMPP; see the report for a checklist.

## Interface refresh (October 2026)

- Redesigned using a non-blue palette: warm ivory, charcoal, terracotta and olive.
- Responsive sidebar with hamburger navigation on small screens.
- CSS-only transitions, entrance motion and decorative orbit animation; reduced-motion preference respected.
- Student database schema and CRUD functionality remain unchanged.
- Bootstrap and Google Fonts use CDNs, so internet is needed for those external styles/fonts; custom CSS works locally.
- Add screenshots of your **running local installation** to the submitted project report before submission.
