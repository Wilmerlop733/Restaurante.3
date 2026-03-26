<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Categoria</title>
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.setAttribute('data-bs-theme', 'dark');
    } else {
      document.documentElement.setAttribute('data-bs-theme', 'light');
    }
  </script>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h2>Editar Categoria</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="/categoria/{{$dCategoriaE->id}}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="id" class="form-label">IdCategoria</label>
        <input type="text" class="form-control" name="id" id="id" value="{{$dCategoriaE->id}}" readonly>
      </div>

      <div class="mb-3">
        <label for="nombrecat" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombrecat" id="nombrecat" value="{{$dCategoriaE->nombrecat}}" required>
      </div>

      <div class="mb-3">
        <label for="descripcioncat" class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="descripcioncat" id="descripcioncat" value="{{$dCategoriaE->descripcioncat}}" required>
      </div>

      <div class="mb-3">
        <label for="encargadocat" class="form-label">Encargado</label>
        <input type="text" class="form-control" name="encargadocat" id="encargadocat" value="{{$dCategoriaE->encargadocat}}" required>
      </div>

      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary">Volver</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
