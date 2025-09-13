<?php
require_once __DIR__ . '/../includes/config.php';

function user_find_by_email($email) {
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute([$email]);
  return $stmt->fetch();
}
function user_create($name, $email, $password, $role='member') {
  global $pdo;
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $pdo->prepare("INSERT INTO users (name,email,password_hash,role) VALUES (?,?,?,?)");
  $stmt->execute([$name, $email, $hash, $role]);
  return $pdo->lastInsertId();
}
?>
