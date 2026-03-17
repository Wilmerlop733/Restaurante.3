<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Ingrediente</title>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>Crear Ingrediente</h1>

    <form action="/ingredientes" method="POST">
      @csrf

      <div class="mb-3">
        <label for="idingredientes" class="form-label">IdIngredientes</label>
        <input type="text" class="form-control" name="idingredientes" id="idingredientes" required>
      </div>

      <div class="mb-3">
        <label for="nombreingre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombreingre" id="nombreingre" required>
      </div>

      <div class="mb-3">
        <label for="inventario" class="form-label">Inventario</label>
        <input type="text" class="form-control" name="inventario" id="inventario" required>
      </div>

      <button type="submit" class="btn btn-primary">Guardar Ingrediente</button>
      <a href="/ingredientes" class="btn btn-secondary">Volver</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
