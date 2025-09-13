<?php ?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?= htmlspecialchars($page_title ?? $SITE_NAME, ENT_QUOTES) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_desc ?? 'Supportive therapy services with resources and easy booking.', ENT_QUOTES) ?>"/>
  <link rel="stylesheet" href="<?= rtrim($BASE_URL, '/')?>/assets/css/styles.css"/>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
<?php include __DIR__ . '/nav.php'; ?>
