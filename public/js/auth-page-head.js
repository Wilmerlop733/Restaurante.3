(function () {
  if (typeof Turbo !== 'undefined') {
    Turbo.session.drive = false;
  }
  localStorage.removeItem('theme');
  try {
    localStorage.clear();
  } catch (e) { /* ignore */ }
  document.documentElement.setAttribute('data-bs-theme', 'light');
  if (sessionStorage.getItem('force_clear')) {
    sessionStorage.removeItem('force_clear');
    location.reload();
  }
})();
