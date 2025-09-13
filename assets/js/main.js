
(function(){
  // Modal viewer used on resources page  (align with CSS: .modal[open])
  const modal = document.getElementById('modal');
  if (modal) {
    const img = modal.querySelector('.modal__img');
    const closeBtn = modal.querySelector('.modal__close');
    document.querySelectorAll('.thumb').forEach(thumb => {
      thumb.addEventListener('click', () => {
        img.src = thumb.dataset.large || thumb.querySelector('img')?.src || '';
        modal.setAttribute('open', 'true');
        closeBtn?.focus();
      });
    });
    function closeModal(){ modal.removeAttribute('open'); }
    closeBtn?.addEventListener('click', closeModal);
    modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });
    window.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });
  }

  // Async form handling to hit PHP controllers
  function setupForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return;
    const msg = form.querySelector('.form-msg');
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const data = new FormData(form);
      const csrf = form.querySelector('input[name="csrf"]')?.value;
      if (csrf) data.append('csrf', csrf);
      const action = form.getAttribute('action') || form.dataset.action || formId;
      try {
        const res = await fetch(action, { method: 'POST', body: data, credentials: 'same-origin' });
        const out = await res.json();
        if (msg) {
          msg.textContent = out.message || 'Success.';
          msg.className = 'form-msg ' + (out.ok ? 'success' : 'error');
        }
        if (out.redirect) window.location.href = out.redirect;
        if (out.ok && formId === 'testimonial-form') form.reset();
      } catch (err) {
        if (msg) {
          msg.textContent = 'Network error. Please try again.';
          msg.className = 'form-msg error';
        }
      }
    });
  }
  setupForm('contact-form');
  setupForm('login-form');
  setupForm('register-form');
  setupForm('testimonial-form');

  // Filters on resources page
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const category = btn.dataset.filter;
      document.querySelectorAll('.thumb').forEach(el => {
        el.style.display = (category && el.dataset.category !== category) ? 'none' : '';
      });
    });
  });
})();
