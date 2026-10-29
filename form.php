<?php
require 'includes/db.php'; require 'includes/functions.php';
$id=filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT) ?: 0;
$data=['full_name'=>'','enrollment_no'=>'','email'=>'','phone'=>'','course'=>'BCA','semester'=>1];
if ($id) {
 $stmt=$conn->prepare('SELECT * FROM students WHERE id=?'); $stmt->bind_param('i',$id); $stmt->execute();
 $found=$stmt->get_result()->fetch_assoc(); if (!$found) { http_response_code(404); die('Student not found.'); }
 $data=$found;
}
$errors=[];
if ($_SERVER['REQUEST_METHOD']==='POST') {
 $id=filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT) ?: 0;
 foreach($data as $key=>$value) if (isset($_POST[$key])) $data[$key]=trim((string)$_POST[$key]);
 $errors=valid_student($data);
 if (!$errors) {
  if ($id) {
   $stmt=$conn->prepare('UPDATE students SET enrollment_no=?, full_name=?, email=?, phone=?, course=?, semester=? WHERE id=?');
   $stmt->bind_param('sssssii',$data['enrollment_no'],$data['full_name'],$data['email'],$data['phone'],$data['course'],$data['semester'],$id);
  } else {
   $stmt=$conn->prepare('INSERT INTO students (enrollment_no,full_name,email,phone,course,semester) VALUES (?,?,?,?,?,?)');
   $stmt->bind_param('sssssi',$data['enrollment_no'],$data['full_name'],$data['email'],$data['phone'],$data['course'],$data['semester']);
  }
  try { $stmt->execute(); header('Location: students.php?msg='.urlencode($id?'Student updated successfully!':'Student registered successfully!')); exit; }
  catch (mysqli_sql_exception $e) { $errors[] = $e->getCode()===1062 ? 'This enrollment number is already registered.' : 'Could not save student. Please check the details.'; }
 }
}
$pageTitle=$id?'Edit Student':'Register Student'; include 'includes/header.php';
?>
<div class="page-heading"><div class="eyebrow mb-2">STUDENT REGISTRATION</div><h1><?= $id?'Edit Student':'Register New Student' ?></h1><p><?= $id?'Update the details below and save changes.':'Fill in the details to add a student to your database.' ?></p></div>
<div class="panel" style="max-width:900px"><div class="section-heading"><h2>Personal & Academic Information</h2><span class="pill">Required Fields</span></div>
<?php if ($errors): ?><div class="alert alert-danger"><strong>Please fix:</strong><ul class="mb-0"><?php foreach($errors as $error): ?><li><?= h($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form method="post" action="form.php<?= $id?'?id='.$id:'' ?>"><input type="hidden" name="id" value="<?= (int)$id ?>"><div class="row g-4">
<div class="col-md-6"><label class="form-label">Full Name *</label><input class="form-control" name="full_name" maxlength="100" required minlength="2" value="<?= h($data['full_name']) ?>" placeholder="e.g. Aarav Shah"></div>
<div class="col-md-6"><label class="form-label">Enrollment Number *</label><input class="form-control" name="enrollment_no" maxlength="30" required value="<?= h($data['enrollment_no']) ?>" placeholder="e.g. BCA2026005"><div class="field-hint">Must be unique for each student</div></div>
<div class="col-md-6"><label class="form-label">Email Address *</label><input class="form-control" name="email" type="email" maxlength="120" required value="<?= h($data['email']) ?>" placeholder="student@example.com"></div>
<div class="col-md-6"><label class="form-label">Phone Number *</label><input class="form-control" name="phone" inputmode="numeric" minlength="10" maxlength="15" required value="<?= h($data['phone']) ?>" placeholder="10 to 15 digits"></div>
<div class="col-md-6"><label class="form-label">Course *</label><select class="form-select" name="course" required><?php foreach(['BCA','BBA','B.Com','B.Sc IT','MCA','MBA'] as $course): ?><option value="<?= h($course) ?>" <?= $data['course']===$course?'selected':'' ?>><?= h($course) ?></option><?php endforeach; ?></select></div>
<div class="col-md-6"><label class="form-label">Semester *</label><select class="form-select" name="semester" required><?php for($i=1;$i<=8;$i++): ?><option value="<?= $i ?>" <?= (int)$data['semester']===$i?'selected':'' ?>>Semester <?= $i ?></option><?php endfor; ?></select></div>
</div><hr class="my-4"><div class="quick-actions"><button type="submit" class="btn btn-primary"><?= $id?'Save Changes':'Register Student' ?> →</button><a href="students.php" class="btn btn-outline-secondary">Cancel</a></div></form></div>
<?php include 'includes/footer.php'; ?>
