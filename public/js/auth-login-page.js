document.addEventListener('DOMContentLoaded', function () {
  if (typeof Turbo !== 'undefined') {
    Turbo.session.drive = false;
  }
  localStorage.removeItem('theme');
  try {
    localStorage.clear();
  } catch (e) { /* ignore */ }
  document.documentElement.setAttribute('data-bs-theme', 'light');

  var el = document.getElementById('auth-page');
  if (el && el.getAttribute('data-force-clear') === '1') {
    sessionStorage.setItem('force_clear', 'true');
    window.location.href = window.location.href;
  }
});
