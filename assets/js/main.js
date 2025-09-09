/* MindGlow Therapy - main.js */
// Utility: set active nav based on current path
(function setActiveNav(){
  const path = location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-list a').forEach(a => {
    const href = a.getAttribute('href');
    if ((path === '' && href.endsWith('index.html')) || href.endsWith(path)) {
      a.setAttribute('aria-current', 'page');
    }
  });
})();

// Resources: filter buttons
const filterBtns = document.querySelectorAll('.filter-btn');
const items = document.querySelectorAll('[data-category]');
filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    const isActive = btn.getAttribute('aria-pressed') === 'true';
    filterBtns.forEach(b => b.setAttribute('aria-pressed', 'false'));
    btn.setAttribute('aria-pressed', String(!isActive));
    const cat = isActive ? 'all' : btn.dataset.filter;
    items.forEach(el => {
      const show = (cat === 'all') || (el.dataset.category === cat);
      el.style.display = show ? '' : 'none';
    });
  });
});

// Modal viewer for gallery
const modal = document.getElementById('modal');
if (modal) {
  const modalImg = modal.querySelector('.modal__img');
  const modalTitle = modal.querySelector('.modal__title');
  const closeBtn = modal.querySelector('.modal__close');
  document.querySelectorAll('.thumb').forEach(fig => {
    fig.addEventListener('click', () => {
      const large = fig.dataset.large || fig.querySelector('img').src;
      const caption = fig.querySelector('figcaption')?.textContent?.trim() || 'Preview';
      modalImg.src = large;
      modalTitle.textContent = caption;
      modal.setAttribute('open', 'true');
      closeBtn.focus();
    });
  });
  function closeModal(){ modal.removeAttribute('open'); }
  closeBtn.addEventListener('click', closeModal);
  modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });
  window.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });
}

// Contact form validation + success message (demo only)
const contactForm = document.getElementById('contact-form');
if (contactForm) {
  const msg = document.querySelector('.form-msg');
  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    if (!contactForm.checkValidity()) {
      msg.textContent = 'Please fix the highlighted fields.';
      msg.className = 'form-msg error';
      return;
    }
    const name = contactForm.querySelector('#name').value.trim();
    msg.textContent = `Thanks, ${name}! Your message has been recorded (demo).`;
    msg.className = 'form-msg success';
    contactForm.reset();
  });
}

// Testimonials: add client-side testimonial
const tForm = document.getElementById('testimonial-form');
if (tForm) {
  const grid = document.querySelector('.testimonials-grid');
  tForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const text = tForm.querySelector('#t-text').value.trim();
    const name = tForm.querySelector('#t-name').value.trim() || 'Anonymous';
    const rating = tForm.querySelector('input[name="rating"]:checked')?.value || '5';
    if (!text) return;
    const card = document.createElement('article');
    card.className = 'testimonial-card';
    card.innerHTML = `<div class="stars" aria-label="${rating} out of 5 stars">${'★'.repeat(+rating)}${'☆'.repeat(5-+rating)}</div>
      <p>${text}</p><p><strong>— ${name}</strong></p>`;
    grid.prepend(card);
    tForm.reset();
  });
}