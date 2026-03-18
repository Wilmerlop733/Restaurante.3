<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú</title>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5 text-center">
    <h1 class="mb-4">Menú</h1>
    
    <div class="dropdown mb-4">
      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Opciones del Sistema
      </button>
      <ul class="dropdown-menu mx-auto">
        <li><a class="dropdown-item" href="/categorias">Categorias</a></li>
        <li><a class="dropdown-item" href="/ingredientes">Ingredientes</a></li>
        <li><a class="dropdown-item" href="/platos">Platos</a></li>
        <li><a class="dropdown-item" href="/recetas">Recetas</a></li>
      </ul>
    </div>

    <div class="row mb-4">
      <div class="col-md-4">
        <img src="/imag/jay-wennington-N_Y88TWmGwA-unsplash.jpg" class="img-fluid rounded shadow-sm" alt="Plato 1">
      </div>
      <div class="col-md-4">
        <img src="/imag/tim-mossholder-FH3nWjvia-U-unsplash (1).jpg" class="img-fluid rounded shadow-sm" alt="Plato 2">
      </div>
      <div class="col-md-4">
        <img src="/imag/sandra-seitamaa-OFJGlG3sKik-unsplash.jpg" class="img-fluid rounded shadow-sm" alt="Plato 3">
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
