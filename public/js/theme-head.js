(function () {
  var saved = localStorage.getItem('theme');
  if (saved === 'dark') {
    document.documentElement.setAttribute('data-bs-theme', 'dark');
  } else {
    document.documentElement.setAttribute('data-bs-theme', 'light');
    if (!saved) {
      localStorage.setItem('theme', 'light');
    }
  }
})();
