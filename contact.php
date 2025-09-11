<?php
require_once __DIR__ . '/includes/config.php';
$page_title = "MindGlow Therapy — Contact";
$page_desc = "Get in touch or book a session.";
include __DIR__ . '/partials/head.php';
?>
<main id="main" class="container section">
  <h1>Contact</h1>
  <p>We would love to hear from you. Reach us on <a href="mailto:hello@mindglow.example">hello@mindglow.example</a> or use the form below.</p>

  <form id="contact-form" action="controllers/contact_submit.php" method="post" novalidate aria-describedby="form-help">
    <?= csrf_field() ?>
    <div class="row">
      <div>
        <label for="name">Name <span class="req">*</span></label>
        <input type="text" id="name" name="name" required aria-required="true" placeholder="Your full name"/>
      </div>
      <div>
        <label for="email">Email <span class="req">*</span></label>
        <input type="email" id="email" name="email" required aria-required="true" placeholder="you@example.com"/>
      </div>
    </div>
    <div class="row row-1">
      <div>
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="How can we help?"/>
      </div>
      <div>
        <label for="message">Message <span class="req">*</span></label>
        <textarea id="message" name="message" required aria-required="true" placeholder="Write your message"></textarea>
      </div>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn">Send</button>
      <span class="form-msg" role="status" aria-live="polite"></span>
    </div>
    <p id="form-help">All fields marked * are required.</p>
  </form>

  <section class="section">
    <h2>Privacy Notice</h2>
    <p>We collect your name, email, and message to respond to your enquiry. We do not share your data with third parties. Your data is stored securely and can be deleted upon request by emailing <a href="mailto:privacy@mindglow.example">privacy@mindglow.example</a>.</p>
  </section>
</main>
<?php include __DIR__ . '/partials/footer.php'; ?>
