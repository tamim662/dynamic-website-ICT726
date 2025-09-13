<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/models/resources.php';
$page_title = "MindGlow Therapy — Resources (Media Gallery)";
$page_desc = "Self-help articles, videos, and podcast clips.";
$items = resources_all();
include __DIR__ . '/partials/head.php';
?>
<main id="main" class="container section">
  <h1>Resources</h1>
  <p>Explore articles, videos, and podcasts. Click any card to view larger.</p>

  <div class="filters" role="toolbar" aria-label="Filter resources">
    <button class="filter-btn" data-filter="articles" aria-pressed="false">Articles</button>
    <button class="filter-btn" data-filter="videos" aria-pressed="false">Videos</button>
    <button class="filter-btn" data-filter="podcasts" aria-pressed="false">Podcasts</button>
  </div>

  <section class="gallery" aria-label="Media gallery">
    <?php foreach ($items as $it): ?>
      <figure class="thumb" data-category="<?= htmlspecialchars($it['type']) ?>" data-large="<?= htmlspecialchars($it['media_url']) ?>">
        <img src="<?= htmlspecialchars($it['media_url']) ?>" alt="<?= htmlspecialchars($it['title']) ?>"/>
        <figcaption><?= htmlspecialchars($it['title']) ?></figcaption>
      </figure>
    <?php endforeach; ?>
  </section>

  <div class="modal" id="modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <div class="modal__dialog">
      <div class="modal__header">
        <h2 class="modal__title" id="modal-title">Preview</h2>
        <button class="modal__close" aria-label="Close preview">&times;</button>
      </div>
      <div class="modal__body">
        <img class="modal__img" src="" alt="Expanded media preview"/>
      </div>
    </div>
  </div>
</main>
<?php include __DIR__ . '/partials/footer.php'; ?>
