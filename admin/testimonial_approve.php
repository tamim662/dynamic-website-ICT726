<?php
require_once __DIR__ . '/../includes/config.php';
require_role('admin');
require_once __DIR__ . '/../models/testimonials.php';
if (!csrf_check($_POST['csrf'] ?? '')) { http_response_code(400); echo "CSRF"; exit; }
$id = (int)($_POST['id'] ?? 0);
$approved = (int)($_POST['approved'] ?? 0);
if ($id) testimonial_set_approved($id,$approved);
header("Location: /admin/index.php"); exit;
