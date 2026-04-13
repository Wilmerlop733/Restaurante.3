(function () {
  if (typeof window.initNavbar !== 'undefined') {
    return;
  }

  window.initNavbar = function () {
    var themeCheckbox = document.getElementById('themeCheckbox');
    if (themeCheckbox) {
      var currentTheme = localStorage.getItem('theme') || 'light';
      themeCheckbox.checked = currentTheme === 'dark';
      document.documentElement.setAttribute('data-bs-theme', currentTheme);

      themeCheckbox.onchange = function (e) {
        var newTheme = e.target.checked ? 'dark' : 'light';
        document.documentElement.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);
      };
    }

    var attempts = 0;
    function initDropdowns() {
      if (typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
        document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(function (dropdownToggleEl) {
          try {
            var prev = bootstrap.Dropdown.getInstance(dropdownToggleEl);
            if (prev) prev.dispose();
            new bootstrap.Dropdown(dropdownToggleEl);
          } catch (err) {
            console.error('Error initializing dropdown:', err);
          }
        });
      } else if (attempts < 20) {
        attempts += 1;
        setTimeout(initDropdowns, 100);
      }
    }
    initDropdowns();
  };

  document.addEventListener('turbo:load', window.initNavbar);

  if (document.readyState === 'complete') {
    window.initNavbar();
  } else {
    window.addEventListener('load', window.initNavbar);
  }
})();
