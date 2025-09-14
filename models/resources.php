<?php
require_once __DIR__ . '/../includes/config.php';

function testimonials_public() {
  global $pdo;
  return $pdo->query("SELECT * FROM testimonials WHERE approved=1 ORDER BY created_at DESC")->fetchAll();
}
function testimonial_submit($name,$rating,$message) {
  global $pdo;
  $stmt = $pdo->prepare("INSERT INTO testimonials (user_name, rating, message, approved) VALUES (?,?,?,0)");
  $stmt->execute([$name ?: null, $rating, $message]);
  return $pdo->lastInsertId();
}
function testimonials_all() {
  global $pdo;
  return $pdo->query("SELECT * FROM testimonials ORDER BY created_at DESC")->fetchAll();
}
function testimonial_set_approved($id,$approved) {
  global $pdo;
  $stmt = $pdo->prepare("UPDATE testimonials SET approved=? WHERE id=?");
  return $stmt->execute([(int)$approved, $id]);
}
function testimonial_delete($id) {
  global $pdo;
  $stmt = $pdo->prepare("DELETE FROM testimonials WHERE id=?");
  return $stmt->execute([$id]);
}
?>
