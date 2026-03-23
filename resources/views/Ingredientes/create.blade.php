<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Ingrediente</title>
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.setAttribute('data-bs-theme', 'dark');
    }
  </script>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>Crear Ingrediente</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="/ingrediente" method="POST">
      @csrf

      <div class="mb-3">
        <label for="nombreingre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombreingre" id="nombreingre" required>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="cantidad" class="form-label">Cantidad en Inventario</label>
          <input type="number" step="0.01" class="form-control" name="cantidad" id="cantidad" required>
        </div>
        <div class="col-md-6">
          <label for="unidad_medida" class="form-label">Unidad de Medida</label>
          <select class="form-select" name="unidad_medida" id="unidad_medida" required>
            <option value="" disabled selected>Selecciona una unidad...</option>
            <option value="kg">Kilogramos (kg)</option>
            <option value="g">Gramos (g)</option>
            <option value="L">Litros (L)</option>
            <option value="ml">Mililitros (ml)</option>
            <option value="unidades">Unidades</option>
            <option value="libras">Libras</option>
            <option value="onzas">Onzas</option>
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary">Volver</a>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
