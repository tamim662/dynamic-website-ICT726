<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../models/testimonials.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { echo json_encode(['ok'=>false,'message'=>'Invalid method']); exit; }
if (!csrf_check($_POST['csrf'] ?? '')) { echo json_encode(['ok'=>false,'message'=>'Invalid CSRF token']); exit; }

$message = trim($_POST['message'] ?? '');
$name = trim($_POST['name'] ?? '');
$rating = (int)($_POST['rating'] ?? 5);
$rating = max(1, min(5, $rating));

if (!$message || strlen($message) < 5) {
  echo json_encode(['ok'=>false,'message'=>'Please write a short message (5+ chars).']);
  exit;
}
testimonial_submit($name, $rating, $message);
echo json_encode(['ok'=>true,'message'=>'Thanks! Your story will appear once approved.']);
