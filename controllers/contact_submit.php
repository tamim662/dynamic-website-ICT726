<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../models/contacts.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { echo json_encode(['ok'=>false,'message'=>'Invalid method']); exit; }
if (!csrf_check($_POST['csrf'] ?? '')) { echo json_encode(['ok'=>false,'message'=>'Invalid CSRF token']); exit; }

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if (!$name || !filter_var($email, FILTER_VALIDATE_EMAIL) || !$message) {
  echo json_encode(['ok'=>false,'message'=>'Please fill required fields with valid data.']);
  exit;
}

contact_create($name,$email,$subject,$message);
echo json_encode(['ok'=>true,'message'=>'Thanks! We will get back to you.']);
