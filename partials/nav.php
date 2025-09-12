<?php
// Header + nav; keeps ARIA semantics from the user's HTML
?>
<header class="site-header" role="banner">
  <div class="container main-nav" role="navigation" aria-label="Primary">
    <a class="logo" href="index.php">
      <span class="logo-badge" aria-hidden="true"></span>
      <span>MindGlow Therapy</span>
    </a>
    <nav aria-label="Main">
      <ul class="nav-list" role="menubar">
        <li role="none"><a role="menuitem" href="index.php">Home</a></li>
        <li role="none"><a role="menuitem" href="services.php">Services</a></li>
        <li role="none"><a role="menuitem" href="resources.php">Resources</a></li>
        <li role="none"><a role="menuitem" href="testimonials.php">Testimonials</a></li>
        <li role="none"><a role="menuitem" href="contact.php">Contact</a></li>
        <?php if (is_admin()): ?>
          <li role="none"><a role="menuitem" href="admin/index.php">Admin</a></li>
        <?php endif; ?>
        <?php if (current_user()): ?>
          <li role="none"><a role="menuitem" href="auth/logout.php">Logout</a></li>
        <?php else: ?>
          <li role="none"><a role="menuitem" href="auth/login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</header>
