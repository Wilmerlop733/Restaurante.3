<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Categoria</title>
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
    <h2>Agregar Nueva Categoria</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="/categoria" method="POST">
      @csrf

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
      <a href="#" onclick="history.back()" class="btn btn-secondary">Volver</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
