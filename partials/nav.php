<?php ?>
<header class="site-header" role="banner">
  <div class="container main-nav" role="navigation" aria-label="Primary">
    <a class="logo" href="<?= rtrim($BASE_URL, '/')?>/index.php">
      <span class="logo-badge" aria-hidden="true"></span>
      <span>MindGlow Therapy</span>
    </a>
    <nav aria-label="Main">
      <ul class="nav-list" role="menubar">
        <li role="none"><a role="menuitem" href="<?= rtrim($BASE_URL, '/')?>/index.php">Home</a></li>
        <li role="none"><a role="menuitem" href="<?= rtrim($BASE_URL, '/')?>/services.php">Services</a></li>
        <li role="none"><a role="menuitem" href="<?= rtrim($BASE_URL, '/')?>/resources.php">Resources</a></li>
        <li role="none"><a role="menuitem" href="<?= rtrim($BASE_URL, '/')?>/testimonials.php">Testimonials</a></li>
        <li role="none"><a role="menuitem" href="<?= rtrim($BASE_URL, '/')?>/contact.php">Contact</a></li>
        <?php if (is_admin()): ?><li role="none"><a role="menuitem" href="<?= rtrim($BASE_URL, '/')?>/admin/index.php">Admin</a></li><?php endif; ?>
        <?php if (current_user()): ?><li role="none"><a role="menuitem" href="<?= rtrim($BASE_URL, '/')?>/auth/logout.php">Logout</a></li><?php else: ?><li role="none"><a role="menuitem" href="<?= rtrim($BASE_URL, '/')?>/auth/login.php">Login</a></li><?php endif; ?>
      </ul>
    </nav>
  </div>
</header>
