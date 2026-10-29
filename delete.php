<?php
require 'includes/db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Method not allowed'); }
$id=filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
if (!$id || $id<1) { http_response_code(400); exit('Invalid student ID'); }
$stmt=$conn->prepare('DELETE FROM students WHERE id=?');
$stmt->bind_param('i',$id);
$stmt->execute();
header('Location: students.php?msg='.urlencode('Student deleted successfully!'));
exit;
