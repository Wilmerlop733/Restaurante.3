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

    function initAllDropdowns() {
      document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(function (toggleEl) {
        var instance = bootstrap.Dropdown.getInstance(toggleEl);
        if (instance) instance.dispose();
      });

      document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(function (toggleEl) {
        try {
          new bootstrap.Dropdown(toggleEl, { boundary: 'window' });
        } catch (err) {
          console.warn('Dropdown init failed:', err);
        }
      });
    }

    let attempts = 0;
    const maxAttempts = 50;
    function retryInit() {
      if (typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
        initAllDropdowns();
      } else if (attempts < maxAttempts) {
        attempts++;
        setTimeout(retryInit, 50);
      }
    }
    retryInit();

    const observer = new MutationObserver(function() {
      setTimeout(initAllDropdowns, 100);
    });

    const langContainer = document.getElementById('langDropdownContainer');
    if (langContainer) {
      observer.observe(document.body, { childList: true, subtree: true });
    }

    document.addEventListener('click', function(e) {
      const link = e.target.closest('a[href^="/lang/"]');
      if (link) {
        e.preventDefault();
        const locale = link.getAttribute('href').split('/').pop();
        fetch('/lang/' + locale, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') || '',
            'Accept': 'application/json'
          }
        }).then(() => window.location.reload())
        .catch(() => window.location = link.href);
      }
    });
  };

  document.addEventListener('turbo:load', window.initNavbar);

  if (document.readyState === 'complete') {
    window.initNavbar();
  } else {
    window.addEventListener('load', window.initNavbar);
  }
 })();
