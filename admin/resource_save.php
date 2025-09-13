<?php
require_once __DIR__ . '/../includes/config.php';
require_role('admin');
require_once __DIR__ . '/../models/resources.php';

if (!csrf_check($_POST['csrf'] ?? '')) { http_response_code(400); echo "CSRF"; exit; }
$type = $_POST['type'] ?? '';
$title = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
$media_url = trim($_POST['media_url'] ?? '');
if (!in_array($type, ['articles','videos','podcasts'], true) || !$title || !$media_url) {
  header("Location: /admin/index.php"); exit;
}
resources_create($type,$title,$description,$media_url);
header("Location: /admin/index.php"); exit;
