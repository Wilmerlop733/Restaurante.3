<div class="global-navbar-container" style="position: relative; z-index: 1030;">
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom">
    <div class="d-flex align-items-center">
      @if(!Route::is('home') && !isset($dInfoCategoria) && !isset($dInfoPlato))
        <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm px-3 rounded-pill me-3 shadow-sm fw-bold">
          <i class="bi bi-arrow-left"></i> {{ __('Volver al Menú') }}
        </a>
      @endif

      <div class="text-start">
        <span class="text-muted fw-bold">{{ __('Hola') }}, <span class="text-primary">{{ Auth::user()->name }}</span>!</span>
      </div>
    </div>
    
    <div class="d-flex align-items-center gap-3">
      <div class="dropdown" id="langDropdownContainer">
          <button class="btn btn-outline-secondary bg-body shadow-sm rounded-pill px-3 py-2 border dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="min-width: 85px; z-index: 1031 !important;">
              <img src="https://flagcdn.com/w80/{{ (App::getLocale() == 'en' || session('locale') == 'en') ? 'us' : 'es' }}.png" alt="Lang" class="rounded-1 shadow-sm" style="width: 25px; height: 16px; object-fit: cover;">
              <i class="bi bi-chevron-down ms-2 text-secondary" style="font-size: 0.8rem;"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end border shadow-lg p-1" style="border-radius: 12px; min-width: 150px; z-index: 1032 !important;">
              <li>
                <a class="dropdown-item rounded-2 p-2 d-flex align-items-center {{ (App::getLocale() == 'en' || session('locale') == 'en') ? 'active' : '' }}" href="{{ route('lang.switch', 'en') }}" data-turbo="false">
                  <img src="https://flagcdn.com/w40/us.png" alt="EN" class="me-2 rounded-1 shadow-sm" style="width: 24px; height: 16px; object-fit: cover;"> <span class="fw-bold small text-uppercase">English</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item rounded-2 p-2 d-flex align-items-center {{ (App::getLocale() == 'es' || session('locale') == 'es') ? 'active' : '' }}" href="{{ route('lang.switch', 'es') }}" data-turbo="false">
                  <img src="https://flagcdn.com/w40/es.png" alt="ES" class="me-2 rounded-1 shadow-sm" style="width: 24px; height: 16px; object-fit: cover;"> <span class="fw-bold small text-uppercase">Español</span>
                </a>
              </li>
          </ul>
      </div>

      <div class="theme-switch-wrapper d-flex align-items-center ms-2">
        <i class="bi bi-sun-fill text-warning" style="font-size: 1rem;"></i>
        <label class="theme-switch mx-2">
          <input type="checkbox" id="themeCheckbox">
          <div class="slider round"></div>
        </label>
        <i class="bi bi-moon-fill text-secondary" style="font-size: 1rem;"></i>
      </div>

      <form action="{{ route('logout') }}" method="POST" class="m-0 ms-2" data-turbo="false">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm px-3 fw-bold rounded-pill shadow-sm">
          <i class="bi bi-box-arrow-right"></i> {{ __('Cerrar Sesión') }}
        </button>
      </form>
    </div>
  </div>
</div>

<link rel="stylesheet" href="/css/navbar.css">

<script>
  if (typeof window.initNavbar === 'undefined') {
    window.initNavbar = function() {
      const themeCheckbox = document.getElementById('themeCheckbox');
      if (themeCheckbox) {
        const currentTheme = localStorage.getItem('theme') || 'light';
        themeCheckbox.checked = (currentTheme === 'dark');
        document.documentElement.setAttribute('data-bs-theme', currentTheme);
        
        themeCheckbox.onchange = function(e) {
          const newTheme = e.target.checked ? 'dark' : 'light';
          document.documentElement.setAttribute('data-bs-theme', newTheme);
          localStorage.setItem('theme', newTheme);
        };
      }

      let attempts = 0;
      const initDropdowns = () => {
        if (typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
          const dropdownElementList = document.querySelectorAll('[data-bs-toggle="dropdown"]');
          dropdownElementList.forEach(dropdownToggleEl => {
            try {
              const prevInstance = bootstrap.Dropdown.getInstance(dropdownToggleEl);
              if (prevInstance) prevInstance.dispose();
              new bootstrap.Dropdown(dropdownToggleEl);
            } catch (e) {
              console.error('Error initializing dropdown:', e);
            }
          });
        } else if (attempts < 20) {
          attempts++;
          setTimeout(initDropdowns, 100);
        }
      };
      initDropdowns();
    };

    document.addEventListener('turbo:load', window.initNavbar);
  }
  
  if (document.readyState === 'complete') {
    window.initNavbar();
  } else {
    window.addEventListener('load', window.initNavbar);
  }
</script>
