<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../models/users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  header('Content-Type: application/json');
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  $token = $_POST['csrf'] ?? '';

  if (!csrf_check($token)) { echo json_encode(['ok'=>false,'message'=>'Invalid CSRF token']); exit; }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !$password) {
    echo json_encode(['ok'=>false,'message'=>'Please enter a valid email and password.']); exit;
  }
  $user = user_find_by_email($email);
  if (!$user || !password_verify($password, $user['password_hash'])) {
    echo json_encode(['ok'=>false,'message'=>'Invalid credentials.']); exit;
  }
  $_SESSION['user'] = ['id'=>$user['id'], 'name'=>$user['name'], 'email'=>$user['email'], 'role'=>$user['role']];
  echo json_encode(['ok'=>true,'message'=>'Logged in.','redirect'=>'/index.php']); exit;
}

$page_title = "Login — MindGlow Therapy";
$page_desc  = "Log in to access your account.";
include __DIR__ . '/../partials/head.php';
?>
<main id="main" class="container section">
  <h1>Login</h1>
  <form id="login-form" method="post" action="login.php" novalidate>
    <?= csrf_field() ?>
    <div class="row">
      <div>
        <label for="email">Email <span class="req">*</span></label>
        <input type="email" id="email" name="email" required>
      </div>
      <div>
        <label for="password">Password <span class="req">*</span></label>
        <input type="password" id="password" name="password" required>
      </div>
    </div>
    <div class="form-actions">
      <button class="btn" type="submit">Log in</button>
      <span class="form-msg" role="status" aria-live="polite"></span>
    </div>
  </form>
  <p>No account? <a href="register.php">Register</a>.</p>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
