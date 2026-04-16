<link rel="stylesheet" href="/css/navbar.css">
<div class="global-navbar-container">
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
          <button class="btn btn-outline-secondary bg-body shadow-sm rounded-pill px-3 py-2 border dropdown-toggle no-caret d-flex align-items-center navbar-lang-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://flagcdn.com/w80/{{ (App::getLocale() == 'en' || session('locale') == 'en') ? 'us' : 'es' }}.png" alt="Lang" width="25" height="16" class="rounded-1 shadow-sm navbar-flag-img">
              <i class="bi bi-chevron-down ms-2 text-secondary navbar-chevron-icon"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end border shadow-lg p-1 navbar-lang-menu">
              <li>
                <a class="dropdown-item rounded-2 p-2 d-flex align-items-center {{ (App::getLocale() == 'en' || session('locale') == 'en') ? 'active' : '' }}" href="{{ route('lang.switch', 'en') }}" data-turbo="false">
                  <img src="https://flagcdn.com/w40/us.png" alt="EN" width="24" height="16" class="me-2 rounded-1 shadow-sm navbar-dropdown-flag"> <span class="fw-bold small text-uppercase">English</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item rounded-2 p-2 d-flex align-items-center {{ (App::getLocale() == 'es' || session('locale') == 'es') ? 'active' : '' }}" href="{{ route('lang.switch', 'es') }}" data-turbo="false">
                  <img src="https://flagcdn.com/w40/es.png" alt="ES" width="24" height="16" class="me-2 rounded-1 shadow-sm navbar-dropdown-flag"> <span class="fw-bold small text-uppercase">Español</span>
                </a>
              </li>
          </ul>
      </div>

      <div class="theme-switch-wrapper d-flex align-items-center ms-2">
        <i class="bi bi-sun-fill text-warning navbar-theme-icon"></i>
        <label class="theme-switch mx-2">
          <input type="checkbox" id="themeCheckbox">
          <div class="slider round"></div>
        </label>
        <i class="bi bi-moon-fill text-secondary navbar-theme-icon"></i>
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

<script src="{{ asset('js/navbar.js') }}"></script>
