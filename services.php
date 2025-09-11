<?php
require_once __DIR__ . '/includes/config.php';
$page_title = "MindGlow Therapy — Services";
$page_desc = "Counseling, group therapy, and crisis support options.";
include __DIR__ . '/partials/head.php';
?>
<main id="main" class="container section">
  <h1>Services</h1>
    <p>Each service includes a short description and simple steps to get started.</p>
    <div class="services-list" role="list">
      <details class="service" role="listitem">
        <summary>
          <img src="assets/images/service-counseling.svg" width="120" height="80" alt="Laptop and chat bubble for online counseling"/>
          <div>
            <h2>Online Counseling</h2>
            <p>One-on-one video sessions tailored to your goals.</p>
          </div>
        </summary>
        <div class="content">
          <ol>
            <li>Book a 15-min intro call.</li>
            <li>Set weekly or fortnightly sessions.</li>
            <li>Measure progress every 4 weeks.</li>
          </ol>
          <p><a class="btn" href="contact.php">Book now</a></p>
        </div>
      </details>

      <details class="service" role="listitem">
        <summary>
          <img src="assets/images/service-group.svg" width="120" height="80" alt="Three circles representing a group"/>
          <div>
            <h2>Group Therapy</h2>
            <p>Peer support with a therapist guiding practical skills.</p>
          </div>
        </summary>
        <div class="content">
          <ol>
            <li>Join a small, topic-based group.</li>
            <li>Weekly 60-min sessions.</li>
            <li>Optional take-home exercises.</li>
          </ol>
          <p><a class="btn" href="contact.php">Register interest</a></p>
        </div>
      </details>

      <details class="service" role="listitem">
        <summary>
          <img src="assets/images/resource-article.svg" width="120" height="80" alt="Leaf icon for crisis resources"/>
          <div>
            <h2>Crisis Support (Info)</h2>
            <p>If you are in crisis, use these numbers and steps now.</p>
          </div>
        </summary>
        <div class="content">
          <ul>
            <li>Call local emergency services.</li>
            <li>Reach out to a trusted person.</li>
            <li>Use grounding and breathing until help arrives.</li>
          </ul>
          <p><a class="btn secondary" href="resources.php">See resources</a></p>
        </div>
      </details>
    </div>
</main>
<?php include __DIR__ . '/partials/footer.php'; ?>
