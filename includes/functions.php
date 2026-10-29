<?php
function h($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function go($message) { header('Location: index.php?msg=' . urlencode($message)); exit; }
function valid_student($data) {
    $errors = [];
    if (strlen($data['full_name']) < 2 || strlen($data['full_name']) > 100) $errors[] = 'Name must be 2–100 characters.';
    if (!preg_match('/^[A-Za-z0-9\/-]{3,30}$/', $data['enrollment_no'])) $errors[] = 'Enrollment number must be 3–30 letters, digits, / or -.';
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) || strlen($data['email']) > 120) $errors[] = 'Enter a valid email.';
    if (!preg_match('/^[0-9]{10,15}$/', $data['phone'])) $errors[] = 'Phone must have 10–15 digits.';
    if (!in_array($data['course'], ['BCA','BBA','B.Com','B.Sc IT','MCA','MBA'], true)) $errors[] = 'Select a valid course.';
    if (filter_var($data['semester'], FILTER_VALIDATE_INT, ['options'=>['min_range'=>1,'max_range'=>8]]) === false) $errors[] = 'Semester must be 1–8.';
    return $errors;
}
?>
