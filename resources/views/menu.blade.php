<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú</title>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/css/theme.css">
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.setAttribute('data-bs-theme', 'dark');
    }
  </script>
  <style>
    .menu-img {
      width: 100%;
      height: 400px;
      object-fit: cover;
    }
  </style>
</head>

<body class="bg-body-tertiary">

  <div class="container mt-5 text-center">
    <div class="d-flex justify-content-end mb-3 align-items-center">
      <span class="me-3 text-muted">Hola, <strong>{{ Auth::user()->name }}</strong>!</span>
      <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">Cerrar Sesión</button>
      </form>
      <div class="theme-switch-wrapper ms-4">
        <i class="bi bi-moon-fill fs-5 me-2" style="color: #aaa;"></i>
        <label class="theme-switch">
          <input type="checkbox" id="themeCheckbox">
          <div class="slider round"></div>
        </label>
        <i class="bi bi-sun-fill fs-5 ms-2" style="color: #aaa;"></i>
      </div>
    </div>

    <h1 class="mb-4">Menú principal</h1>

    <div class="row justify-content-center mb-4">
      <div class="col-md-3 mb-2">
        <a href="/categoria" class="btn btn-outline-primary w-100 py-3 shadow-sm">
          <i class="bi bi-tags"></i><br>Categorías
        </a>
      </div>
      <div class="col-md-3 mb-2">
        <a href="/plato" class="btn btn-outline-warning w-100 py-3 shadow-sm">
          <i class="bi bi-egg-fried"></i><br>Platos
        </a>
      </div>
      <div class="col-md-3 mb-2">
        <a href="/ingrediente" class="btn btn-outline-success w-100 py-3 shadow-sm">
          <i class="bi bi-egg"></i><br>Ingredientes
        </a>
      </div>
      <div class="col-md-3 mb-2">
        <a href="/clientes/pedidos" class="btn btn-outline-info w-100 py-3 shadow-sm">
          <i class="bi bi-person-bounding-box"></i><br>Clientes
        </a>
      </div>
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const themeCheckbox = document.getElementById('themeCheckbox');
    const currentTheme = localStorage.getItem('theme');
    
    if (currentTheme === 'light') {
      themeCheckbox.checked = true;
    } else {
      themeCheckbox.checked = false;
    }

    themeCheckbox.addEventListener('change', function(e) {
      if(e.target.checked) {
        document.documentElement.setAttribute('data-bs-theme', 'light');
        localStorage.setItem('theme', 'light');
      } else {
        document.documentElement.setAttribute('data-bs-theme', 'dark');
        localStorage.setItem('theme', 'dark');
      }    
    });
  </script>
</body>

</html>