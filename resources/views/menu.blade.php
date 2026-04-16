<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú</title>
    <script src="{{ asset('js/theme-head.js') }}"></script>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/css/theme.css?v=1.1">
  <link rel="stylesheet" href="/css/menu.css">
  <script src="https://unpkg.com/@hotwired/turbo@7.1.0/dist/turbo.es2017-umd.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @include('Partes.theme-init')
</head>

<body class="bg-body-tertiary">

  <div class="container text-center menu-container">
    @include('Partes.navbar')

    <h1 class="mb-4">{{ __('Menú principal') }}</h1>

    @role('Admin')
    <div class="card border-0 shadow-sm mb-4 overflow-hidden menu-admin-card">
      <div class="card-body p-0">
        <div class="row g-0">
          <div class="col-md-6">
            <a href="/dashboard" class="d-flex align-items-center justify-content-center py-4 text-decoration-none transition-all admin-link admin-link-dashboard">
              <div class="text-white text-center">
                <i class="bi bi-speedometer2 fs-2 mb-1 d-block"></i>
                <span class="fw-bold text-uppercase small admin-label">{{ __('Panel de Control') }}</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 border-start border-white border-opacity-10">
            <a href="{{ route('usuarios.index') }}" class="d-flex align-items-center justify-content-center py-4 text-decoration-none transition-all admin-link admin-link-users">
              <div class="text-white text-center">
                <i class="bi bi-people-fill fs-2 mb-1 d-block"></i>
                <span class="fw-bold text-uppercase small admin-label">{{ __('Gestión de Usuarios') }}</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    @endrole

    <div class="row justify-content-center mb-4">
      @can('ver categorias')
      <div class="col-md-3 mb-2">
        <a href="/categoria" class="btn btn-outline-primary w-100 py-3 shadow-sm">
          <i class="bi bi-tags"></i><br>{{ __('Categorías') }}
        </a>
      </div>
      @endcan
      @can('ver platos')
      <div class="col-md-3 mb-2">
        <a href="/plato" class="btn btn-outline-warning w-100 py-3 shadow-sm">
          <i class="bi bi-egg-fried"></i><br>{{ __('Platos') }}
        </a>
      </div>
      @endcan
      @can('ver ingredientes')
      <div class="col-md-3 mb-2">
        <a href="/ingrediente" class="btn btn-outline-success w-100 py-3 shadow-sm">
          <i class="bi bi-egg"></i><br>{{ __('Ingredientes') }}
        </a>
      </div>
      @endcan
      @can('ver pedidos')
      <div class="col-md-3 mb-2">
        <a href="/clientes/pedidos" class="btn btn-outline-info w-100 py-3 shadow-sm">
          <i class="bi bi-person-bounding-box"></i><br>{{ __('Clientes') }}
        </a>
      </div>
      @endcan
    </div>

    <div class="row mb-4">
      <div class="col-md-3">
        <img src="/imag/jay-wennington-N_Y88TWmGwA-unsplash.jpg" class="img-fluid rounded shadow-sm menu-img" alt="Foto">
      </div>
      <div class="col-md-3">
        <img src="/imag/tim-mossholder-FH3nWjvia-U-unsplash (1).jpg" class="img-fluid rounded shadow-sm menu-img" alt="Foto">
      </div>
      <div class="col-md-3">
        <img src="/imag/sandra-seitamaa-OFJGlG3sKik-unsplash.jpg" class="img-fluid rounded shadow-sm menu-img" alt="Foto">
      </div>
      <div class="col-md-3">
        <img src="/imag/kevin-charit-QusXD31z0G4-unsplash.jpg" class="img-fluid rounded shadow-sm menu-img" alt="Foto">
      </div>
    </div>
  </div>
</body>

</html>

