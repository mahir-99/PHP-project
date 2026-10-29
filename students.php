<?php
require 'includes/db.php'; require 'includes/functions.php';
$q=trim($_GET['q'] ?? '');
if ($q !== '') {
 $term='%'.$q.'%';
 $stmt=$conn->prepare('SELECT * FROM students WHERE full_name LIKE ? OR enrollment_no LIKE ? OR course LIKE ? ORDER BY id DESC');
 $stmt->bind_param('sss',$term,$term,$term); $stmt->execute(); $students=$stmt->get_result();
} else { $students=$conn->query('SELECT * FROM students ORDER BY id DESC'); }
$pageTitle='Students'; include 'includes/header.php';
?>
<div class="page-heading"><div class="eyebrow mb-2">STUDENT DIRECTORY</div><h1>All Students</h1><p>Browse, search and manage your student records.</p></div>
<?php if (isset($_GET['msg'])): ?><div class="alert alert-success"><?= h($_GET['msg']) ?></div><?php endif; ?>
<div class="panel"><div class="section-heading"><div><h2>Student Records</h2><div class="intro-line mt-2"><?= $students->num_rows ?> record(s) found</div></div><a href="form.php" class="btn btn-primary">＋ Add Student</a></div>
<form method="get" class="mb-4 d-flex gap-2"><input class="form-control search" type="search" name="q" value="<?= h($q) ?>" placeholder="Search name, enrollment or course"><button class="btn btn-outline-secondary">Search</button><?php if ($q !== ''): ?><a href="students.php" class="btn btn-light">Clear</a><?php endif; ?></form>
<div class="table-responsive"><table class="table"><thead><tr><th>Student</th><th>Enrollment</th><th>Contact</th><th>Course</th><th>Semester</th><th>Actions</th></tr></thead><tbody><?php while($s=$students->fetch_assoc()): ?><tr><td><span class="initials"><?= h(strtoupper(substr($s['full_name'],0,1))) ?></span><strong><?= h($s['full_name']) ?></strong></td><td><?= h($s['enrollment_no']) ?></td><td><?= h($s['email']) ?><div class="muted"><?= h($s['phone']) ?></div></td><td><span class="pill"><?= h($s['course']) ?></span></td><td><?= (int)$s['semester'] ?></td><td><div class="d-flex align-items-center"><a class="action-link" href="form.php?id=<?= (int)$s['id'] ?>">Edit</a><form action="delete.php" method="post" data-confirm-delete><input type="hidden" name="id" value="<?= (int)$s['id'] ?>"><button class="btn btn-sm btn-outline-danger">Delete</button></form></div></td></tr><?php endwhile; ?></tbody></table></div><?php if($students->num_rows===0): ?><div class="empty">No matching student records found.</div><?php endif; ?></div>
<?php include 'includes/footer.php'; ?>
