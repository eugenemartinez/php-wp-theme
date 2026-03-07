import { gsap } from "gsap";

export function initContact() {
  if (!document.getElementById('contact')) return;

  // ── Initial states ────────────────────────────────────────────
  gsap.set('#ct-content', { opacity: 0, x: -40 });
  gsap.set('#ct-form-wrap', { opacity: 0, x: 40 });

  // ── Entrance animations ───────────────────────────────────────
  gsap.to('#ct-content', {
    opacity: 1, x: 0, duration: 0.8, ease: 'power2.out',
    scrollTrigger: { trigger: '#contact', start: 'top 75%', once: true }
  });

  gsap.to('#ct-form-wrap', {
    opacity: 1, x: 0, duration: 0.8, ease: 'power2.out', delay: 0.2,
    scrollTrigger: { trigger: '#contact', start: 'top 75%', once: true }
  });

  // ── Form input focus animations ───────────────────────────────
  document.querySelectorAll('#ct-form input, #ct-form textarea').forEach(input => {
    input.addEventListener('focus', () => gsap.to(input, { scale: 1.01, duration: 0.2 }));
    input.addEventListener('blur', () => gsap.to(input, { scale: 1, duration: 0.2 }));
  });

  // ── Submit button hover ───────────────────────────────────────
  const submitBtn = document.getElementById('ct-submit');
  if (submitBtn) {
    submitBtn.addEventListener('mouseenter', () => gsap.to(submitBtn, { scale: 1.02, duration: 0.2 }));
    submitBtn.addEventListener('mouseleave', () => gsap.to(submitBtn, { scale: 1, duration: 0.2 }));
  }

  // ── Form submission ───────────────────────────────────────────
  const form = document.getElementById('ct-form');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const firstName = form.querySelector('[name="firstName"]');
    const lastName  = form.querySelector('[name="lastName"]');
    const email     = form.querySelector('[name="email"]');
    const message   = form.querySelector('[name="message"]');
    const status    = document.getElementById('ct-status');
    const submitText    = document.getElementById('ct-submit-text');
    const submitIcon    = document.getElementById('ct-submit-icon');
    const submitSpinner = document.getElementById('ct-submit-spinner');

    // ── Clear previous errors ─────────────────────────────────
    form.querySelectorAll('.ct-error').forEach(el => {
      el.textContent = '';
      el.classList.add('hidden');
    });
    form.querySelectorAll('input, textarea').forEach(el => {
      el.classList.remove('border-destructive');
    });

    // ── Validate ──────────────────────────────────────────────
    let valid = true;

    const showError = (input, msg) => {
      const error = input.parentElement.querySelector('.ct-error');
      if (error) {
        error.textContent = msg;
        error.classList.remove('hidden');
      }
      input.classList.add('border-destructive');
      valid = false;
    };

    if (!firstName.value.trim()) showError(firstName, 'First name is required.');
    if (!lastName.value.trim()) showError(lastName, 'Last name is required.');
    if (!email.value.trim()) showError(email, 'Email is required.');
    else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) showError(email, 'Please enter a valid email.');
    if (!message.value.trim()) showError(message, 'Message is required.');

    if (!valid) return;

    // ── Loading state ─────────────────────────────────────────
    submitBtn.disabled = true;
    submitText.textContent = 'Sending...';
    submitIcon.classList.add('hidden');
    submitSpinner.classList.remove('hidden');

    // ── Submit ────────────────────────────────────────────────
    // Wire up to your backend here — HubSpot, WP AJAX, or any API
    // Example with WP AJAX (uncomment when ready):
    //
    // const formData = new FormData();
    // formData.append('action', 'submit_lead');
    // formData.append('nonce', themeAjax.nonce);
    // formData.append('firstName', firstName.value.trim());
    // formData.append('lastName', lastName.value.trim());
    // formData.append('email', email.value.trim());
    // formData.append('phone', form.querySelector('[name="phone"]').value.trim());
    // formData.append('message', message.value.trim());
    //
    // const response = await fetch(themeAjax.url, { method: 'POST', body: formData });
    // const result = await response.json();

    // ── Placeholder success for boilerplate ───────────────────
    await new Promise(resolve => setTimeout(resolve, 1000));

    status.textContent = 'Message sent! We will get back to you soon.';
    status.className = 'text-sm font-medium px-4 py-3 rounded-xl bg-primary/10 text-primary';
    status.classList.remove('hidden');
    form.reset();

    setTimeout(() => {
      status.classList.add('hidden');
    }, 4000);

    // ── Reset button ──────────────────────────────────────────
    submitBtn.disabled = false;
    submitText.textContent = 'Send Message';
    submitIcon.classList.remove('hidden');
    submitSpinner.classList.add('hidden');
  });
}