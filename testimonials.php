<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/models/testimonials.php';
$testis = testimonials_public();
$page_title = "MindGlow Therapy — Testimonials";
$page_desc = "What clients say about MindGlow Therapy.";
include __DIR__ . '/partials/head.php';
?>
<main id="main" class="container section">
  <h1>Testimonials</h1>
  <section class="testimonials-grid" aria-label="Client stories">
    <?php foreach($testis as $t): ?>
      <article class="testimonial-card">
        <div class="stars" aria-label="<?= (int)$t['rating'] ?> out of 5 stars"><?= str_repeat("★", (int)$t['rating']) . str_repeat("☆", 5 - (int)$t['rating']) ?></div>
        <p><?= htmlspecialchars($t['message']) ?></p>
        <p><strong>— <?= htmlspecialchars($t['user_name'] ?? 'Anonymous') ?></strong></p>
      </article>
    <?php endforeach; ?>
    <?php if (!$testis): ?>
      <p class="notice">No testimonials yet. Be the first to share your experience.</p>
    <?php endif; ?>
  </section>

  <h2>Share your experience</h2>
  <form id="testimonial-form" class="section" action="controllers/testimonial_submit.php" method="post" aria-describedby="t-help">
    <?= csrf_field() ?>
    <div class="row row-1">
      <label for="t-text">Your message <span class="req">*</span></label>
      <textarea id="t-text" name="message" required aria-required="true" placeholder="What would you like to share?"></textarea>
    </div>
    <div class="row">
      <div>
        <label for="t-name">Name (optional)</label>
        <input type="text" id="t-name" name="name" placeholder="Your name"/>
      </div>
      <fieldset>
        <legend>Rating</legend>
        <?php for ($i=5; $i>=1; $i--): ?>
          <label><input type="radio" name="rating" value="<?= $i ?>" <?= $i===5 ? 'checked' : '' ?>/> <?= $i ?></label>
        <?php endfor; ?>
      </fieldset>
    </div>
    <div class="form-actions">
      <button class="btn" type="submit">Submit</button>
      <span class="form-msg" role="status" aria-live="polite"></span>
      <p id="t-help">Stories are reviewed before publishing.</p>
    </div>
  </form>
</main>
<?php include __DIR__ . '/partials/footer.php'; ?>
