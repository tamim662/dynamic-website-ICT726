<?php
require_once __DIR__ . '/../includes/config.php';
require_role('admin');
require_once __DIR__ . '/../models/resources.php';
if (!csrf_check($_POST['csrf'] ?? '')) { http_response_code(400); echo "CSRF"; exit; }
$id = (int)($_POST['id'] ?? 0);
if ($id) resources_delete($id);
header("Location: /admin/index.php"); exit;
