<?php
// config.php — database and site config
$DB_HOST = 'localhost';
$DB_NAME = 'mindglow_db';
$DB_USER = 'mindglow_user';
$DB_PASS = 'password';

$SITE_NAME = 'MindGlow Therapy';
$BASE_URL = ''; 

$pdo = null;
try {
  $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);
} catch (Exception $e) {
  http_response_code(500);
  echo "Database connection failed.";
  exit;
}

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_set_cookie_params([ 'httponly'=>true, 'secure'=>isset($_SERVER['HTTPS']), 'samesite'=>'Lax' ]);
  session_start();
}

// CSRF helpers
if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
function csrf_field() {
  $t = htmlspecialchars($_SESSION['csrf'] ?? '', ENT_QUOTES, 'UTF-8');
  return '<input type="hidden" name="csrf" value="'.$t.'">';
}
function csrf_check($token) {
  return isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token ?? '');
}

// Auth helpers
function current_user() { return $_SESSION['user'] ?? null; }
function require_role($role) {
  $u = current_user();
  if (!$u || ($role && $u['role'] !== $role)) {
    http_response_code(403);
    echo "Forbidden";
    exit;
  }
}
function is_admin() { return (current_user()['role'] ?? '') === 'admin'; }
?>
