<?php
require_once __DIR__ . '/../includes/config.php';

function resources_all() {
  global $pdo;
  return $pdo->query("SELECT * FROM resources ORDER BY created_at DESC")->fetchAll();
}
function resources_create($type,$title,$description,$media_url) {
  global $pdo;
  $stmt = $pdo->prepare("INSERT INTO resources (type,title,description,media_url) VALUES (?,?,?,?)");
  $stmt->execute([$type,$title,$description,$media_url]);
  return $pdo->lastInsertId();
}
function resources_delete($id) {
  global $pdo;
  $stmt = $pdo->prepare("DELETE FROM resources WHERE id=?");
  return $stmt->execute([$id]);
}
?>