
(function(){
  // Modal viewer used on resources page
  const modal = document.getElementById('modal');
  if (modal) {
    const img = modal.querySelector('.modal__img');
    const closeBtn = modal.querySelector('.modal__close');
    document.querySelectorAll('.thumb').forEach(thumb => {
      thumb.addEventListener('click', () => {
        img.src = thumb.dataset.large;
        modal.classList.add('open');
      });
    });
    closeBtn?.addEventListener('click', () => modal.classList.remove('open'));
    modal.addEventListener('click', e => { if (e.target === modal) modal.classList.remove('open'); });
  }

  // Simple client-side validation messages for demo forms
  function setupForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return;
    const msg = form.querySelector('.form-msg');
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const data = new FormData(form);
      // fetch CSRF token value present in hidden input
      const csrf = form.querySelector('input[name="csrf"]')?.value;
      if (csrf) data.append('csrf', csrf);

      const action = form.getAttribute('action') || form.dataset.action || formId;
      try {
        const res = await fetch(action, { method: 'POST', body: data, credentials: 'same-origin' });
        const out = await res.json();
        msg.textContent = out.message || 'Success.';
        msg.className = 'form-msg ' + (out.ok ? 'success' : 'alert');
        if (out.redirect) window.location.href = out.redirect;
        if (out.ok && formId === 'testimonial-form') form.reset();
      } catch (err) {
        msg.textContent = 'Network error. Please try again.';
        msg.className = 'form-msg alert';
      }
    });
  }

  setupForm('contact-form');
  setupForm('login-form');
  setupForm('register-form');
  setupForm('testimonial-form');

  // Filter buttons on resources page
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const category = btn.dataset.filter;
      document.querySelectorAll('.thumb').forEach(el => {
        el.style.display = (category && el.dataset.category !== category) ? 'none' : '';
      });
    });
  });
})();
