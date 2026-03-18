<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Categoria</title>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h2>Agregar Nueva Categoria</h2>

    <form action="/categorias" method="POST">
      @csrf

      <div class="mb-3">
        <label for="idcategoria" class="form-label">IdCategoria</label>
        <input type="text" class="form-control" name="idcategoria" id="idcategoria" required>
      </div>

      <div class="mb-3">
        <label for="nombrecat" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombrecat" id="nombrecat" required>
      </div>

      <div class="mb-3">
        <label for="descripcioncat" class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="descripcioncat" id="descripcioncat" required>
      </div>

      <div class="mb-3">
        <label for="encargadocat" class="form-label">Encargado</label>
        <input type="text" class="form-control" name="encargadocat" id="encargadocat" required>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="/categorias" class="btn btn-secondary">Volver</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
