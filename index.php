<?php
require 'includes/db.php'; require 'includes/functions.php';
$total = (int)$conn->query('SELECT COUNT(*) AS n FROM students')->fetch_assoc()['n'];
$courses = (int)$conn->query('SELECT COUNT(DISTINCT course) AS n FROM students')->fetch_assoc()['n'];
$recent = $conn->query('SELECT * FROM students ORDER BY id DESC LIMIT 5');
$pageTitle = 'Dashboard'; include 'includes/header.php';
?>
<div class="welcome-strip reveal"><span class="welcome-line"></span> YOUR CAMPUS AT A GLANCE <span class="strip-star">✳</span> ACADEMIC YEAR 2026</div>
<section class="hero reveal">
  <div class="hero-copy">
    <div class="eyebrow hero-eyebrow">CAMPUSCORE / STUDENT MANAGEMENT</div>
    <h1>Make room for<br><em>every bright mind.</em></h1>
    <p>A calm, organized home for student registration. All your student records, thoughtfully managed in one place.</p>
    <div class="hero-actions"><a href="form.php" class="btn btn-hero">+ Register student <span>↗</span></a><a href="students.php" class="hero-link">View directory →</a></div>
  </div>
  <div class="hero-art" aria-hidden="true"><div class="orbit orbit-outer"></div><div class="orbit orbit-inner"></div><div class="hero-globe">✳</div><div class="orbit-tag orbit-tag-one">DISCOVER · LEARN</div><div class="orbit-tag orbit-tag-two">CREATE · GROW</div></div>
  <span class="hero-index">EST. 2026 — CAMPUSCORE</span>
</section>
<?php if (isset($_GET['msg'])): ?><div class="alert alert-success mt-3"><?= h($_GET['msg']) ?></div><?php endif; ?>
<div class="stats"><div class="stat-card reveal"><div class="stat-top"><span class="stat-label">REGISTERED STUDENTS</span><span class="stat-icon">↗</span></div><div class="number"><?= $total ?></div><div class="stat-bottom"><span class="status-tick">●</span> Students in your database</div><span class="stat-ornament">01</span></div><div class="stat-card reveal"><div class="stat-top"><span class="stat-label">ACADEMIC PROGRAMS</span><span class="stat-icon">✳</span></div><div class="number"><?= $courses ?></div><div class="stat-bottom"><span class="status-tick">●</span> Unique courses on record</div><span class="stat-ornament">02</span></div></div>
<section class="panel reveal"><div class="section-heading"><div><div class="section-kicker">YOUR RECORDS, AT A GLANCE</div><h2>Recent registrations<span class="heading-period">.</span></h2><p class="intro-line">The latest students welcomed into your campus.</p></div><a href="students.php" class="btn btn-outline-secondary">View all students <span>↗</span></a></div><div class="table-responsive"><table class="table"><thead><tr><th>Student</th><th>Enrollment no.</th><th>Program</th><th>Semester</th><th>Action</th></tr></thead><tbody><?php while ($s=$recent->fetch_assoc()): ?><tr><td><span class="initials"><?= h(strtoupper(substr($s['full_name'],0,1))) ?></span><strong><?= h($s['full_name']) ?></strong></td><td><span class="mono-text"><?= h($s['enrollment_no']) ?></span></td><td><span class="pill"><?= h($s['course']) ?></span></td><td>Semester <?= (int)$s['semester'] ?></td><td><a class="action-link" href="form.php?id=<?= (int)$s['id'] ?>">Edit ↗</a></td></tr><?php endwhile; ?></tbody></table></div><?php if ($total===0): ?><div class="empty">No students yet. <a href="form.php">Register your first student →</a></div><?php endif; ?></section>
<?php include 'includes/footer.php'; ?>
