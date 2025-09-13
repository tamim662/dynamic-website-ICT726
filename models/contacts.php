<?php
require_once __DIR__ . '/../includes/config.php';

function contact_create($name,$email,$subject,$message) {
  global $pdo;
  $stmt = $pdo->prepare("INSERT INTO contacts (name,email,subject,message) VALUES (?,?,?,?)");
  $stmt->execute([$name,$email,$subject,$message]);
  return $pdo->lastInsertId();
}
?>
