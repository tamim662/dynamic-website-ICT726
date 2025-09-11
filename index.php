<?php
require_once __DIR__ . '/includes/config.php';
$page_title = "MindGlow Therapy — Home";
$page_desc = "Supportive therapy services with resources and easy booking.";
include __DIR__ . '/partials/head.php';
?>
<main id="main" class="container">
  <section class="hero section" aria-labelledby="welcome">
    <div>
      <h1 id="welcome">Feel lighter. Think clearer. Grow stronger.</h1>
      <p class="lead">MindGlow Therapy offers one-to-one counseling and group support to help you manage stress, anxiety, and life changes with practical tools.</p>
      <div class="cta-row">
        <a class="btn" href="contact.php">Book a Session</a>
        <a class="btn secondary" href="services.php">View Services</a>
      </div>
    </div>
    <figure aria-label="Calm pastel waves">
      <img src="assets/images/hero.svg" alt="Abstract calming gradient with circular waves"/>
    </figure>
  </section>

  <section class="section" aria-labelledby="quick-links">
    <h2 id="quick-links">Popular resources</h2>
    <div class="cards">
      <article class="card">
        <img src="assets/images/resource-article.svg" alt="Article thumbnail for breathing exercises"/>
        <div class="card__body">
          <h3 class="card__title">Breathing reset (2 min)</h3>
          <p>Quick pattern to reduce stress in the moment.</p>
          <a class="badge" href="resources.php">Open</a>
        </div>
      </article>
      <article class="card">
        <img src="assets/images/resource-video.svg" alt="Video thumbnail for grounding video"/>
        <div class="card__body">
          <h3 class="card__title">5-4-3-2-1 grounding</h3>
          <p>Bring focus back to the present with senses.</p>
          <a class="badge" href="resources.php">Open</a>
        </div>
      </article>
      <article class="card">
        <img src="assets/images/testimonial.svg" alt="Testimonial card with quote mark"/>
        <div class="card__body">
          <h3 class="card__title">Client stories</h3>
          <p>How small steps helped people feel better.</p>
          <a class="badge" href="testimonials.php">Read</a>
        </div>
      </article>
    </div>
  </section>
</main>
<?php include __DIR__ . '/partials/footer.php'; ?>
