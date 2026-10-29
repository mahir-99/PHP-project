<?php $pageTitle = $pageTitle ?? 'Dashboard'; ?>
<!doctype html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#222720"><title><?= h($pageTitle) ?> | CampusCore</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css?v=20261029-motion1"></head><body>
<div class="app-shell">
<aside class="sidebar" id="sidebar">
  <a href="index.php" class="brand"><span class="brand-mark">C<span class="brand-dot">.</span></span><span class="brand-name">Campus<span class="brand-highlight">Core</span><small>STUDENT WORKSPACE</small></span></a>
  <div class="nav-caption">MAIN MENU</div>
  <nav aria-label="Main navigation">
    <a class="side-link <?= $pageTitle==='Dashboard'?'active':'' ?>" href="index.php"><span class="nav-icon">◫</span><span>Overview</span></a>
    <a class="side-link <?= $pageTitle==='Students'?'active':'' ?>" href="students.php"><span class="nav-icon">▤</span><span>Student Directory</span></a>
    <a class="side-link <?= $pageTitle==='Register Student'?'active':'' ?>" href="form.php"><span class="nav-icon">✳</span><span>Register Student</span></a>
  </nav>
  <div class="sidebar-bottom"><div class="sidebar-mini"><span class="mini-symbol">✳</span><div><strong>Made for learning.</strong><p>Thoughtful tools for a better campus.</p></div></div><small>© 2026 CampusCore</small></div>
</aside>
<div class="mobile-overlay" data-close-menu></div>
<main class="main">
<header class="topbar"><div class="topbar-left"><button type="button" class="menu-toggle" aria-label="Open navigation" aria-expanded="false" data-toggle-menu><span aria-hidden="true">☰</span></button><div><div class="top-label">WORKSPACE / <span><?= h(strtoupper($pageTitle)) ?></span></div><div class="top-subtitle">A better way to manage your campus.</div></div></div><div class="topbar-right"><span class="top-date"><?= date('d M Y') ?></span><span class="avatar">CC</span></div></header>
<div class="content">
