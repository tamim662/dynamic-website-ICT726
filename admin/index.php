<?php
require_once __DIR__ . '/../includes/config.php';
require_role('admin');
require_once __DIR__ . '/../models/resources.php';
require_once __DIR__ . '/../models/testimonials.php';
$page_title = "Admin — MindGlow";
include __DIR__ . '/../partials/head.php';
$resources = resources_all();
$testis = testimonials_all();
?>
<main id="main" class="container section">
  <h1>Admin Dashboard</h1>
  <section class="section">
    <h2>Resources</h2>
    <form method="post" action="resource_save.php" enctype="multipart/form-data">
      <?= csrf_field() ?>
      <div class="row">
        <div>
          <label>Type</label>
          <select name="type" required>
            <option value="articles">Articles</option>
            <option value="videos">Videos</option>
            <option value="podcasts">Podcasts</option>
          </select>
        </div>
        <div>
          <label>Title</label>
          <input name="title" required>
        </div>
        <div>
          <label>Description</label>
          <input name="description">
        </div>
        <div>
          <label>Media URL</label>
          <input name="media_url" placeholder="assets/images/resource-article.svg" required>
        </div>
      </div>
      <p><button class="btn">Add Resource</button></p>
    </form>
    <table>
      <thead><tr><th>ID</th><th>Type</th><th>Title</th><th>Media</th><th>Action</th></tr></thead>
      <tbody>
        <?php foreach($resources as $r): ?>
          <tr>
            <td><?= (int)$r['id'] ?></td>
            <td><?= htmlspecialchars($r['type']) ?></td>
            <td><?= htmlspecialchars($r['title']) ?></td>
            <td><code><?= htmlspecialchars($r['media_url']) ?></code></td>
            <td>
              <form method="post" action="resource_delete.php" style="display:inline">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
                <button class="btn secondary" onclick="return confirm('Delete resource?')">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>

  <section class="section">
    <h2>Testimonials moderation</h2>
    <table>
      <thead><tr><th>ID</th><th>Name</th><th>Rating</th><th>Message</th><th>Approved</th><th>Action</th></tr></thead>
      <tbody>
        <?php foreach($testis as $t): ?>
          <tr>
            <td><?= (int)$t['id'] ?></td>
            <td><?= htmlspecialchars($t['user_name'] ?? '—') ?></td>
            <td><?= (int)$t['rating'] ?></td>
            <td><?= htmlspecialchars($t['message']) ?></td>
            <td><?= (int)$t['approved'] ?></td>
            <td>
              <form method="post" action="testimonial_approve.php" style="display:inline">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= (int)$t['id'] ?>">
                <input type="hidden" name="approved" value="<?= $t['approved'] ? 0 : 1 ?>">
                <button class="btn"><?= $t['approved'] ? 'Unapprove' : 'Approve' ?></button>
              </form>
              <form method="post" action="testimonial_delete.php" style="display:inline">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= (int)$t['id'] ?>">
                <button class="btn secondary" onclick="return confirm('Delete testimonial?')">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
