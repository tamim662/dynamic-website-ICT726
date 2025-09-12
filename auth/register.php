<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../models/users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  header('Content-Type: application/json');
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  $token = $_POST['csrf'] ?? '';

  if (!csrf_check($token)) { echo json_encode(['ok'=>false,'message'=>'Invalid CSRF token']); exit; }
  if (!$name || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
    echo json_encode(['ok'=>false,'message'=>'Please provide a name, valid email, and password (6+ chars).']); exit;
  }
  if (user_find_by_email($email)) { echo json_encode(['ok'=>false,'message'=>'Email already registered.']); exit; }
  user_create($name,$email,$password,'member');
  echo json_encode(['ok'=>true,'message'=>'Registration successful. You can log in now.','redirect'=>'/auth/login.php']); exit;
}

$page_title = "Register — MindGlow Therapy";
$page_desc  = "Create an account to access member-only features.";
include __DIR__ . '/../partials/head.php';
?>
<main id="main" class="container section">
  <h1>Register</h1>
  <form id="register-form" method="post" action="register.php" novalidate>
    <?= csrf_field() ?>
    <div class="row">
      <div>
        <label for="name">Name <span class="req">*</span></label>
        <input type="text" id="name" name="name" required>
      </div>
      <div>
        <label for="email">Email <span class="req">*</span></label>
        <input type="email" id="email" name="email" required>
      </div>
    </div>
    <div class="row">
      <div>
        <label for="password">Password (6+ chars) <span class="req">*</span></label>
        <input type="password" id="password" name="password" required minlength="6">
      </div>
    </div>
    <div class="form-actions">
      <button class="btn" type="submit">Create account</button>
      <span class="form-msg" role="status" aria-live="polite"></span>
    </div>
  </form>
  <p>Already have an account? <a href="login.php">Log in</a>.</p>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
