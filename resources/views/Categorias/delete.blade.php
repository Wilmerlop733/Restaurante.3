<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Eliminar Categoria') }}</title>
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.setAttribute('data-bs-theme', 'dark');
    } else {
      document.documentElement.setAttribute('data-bs-theme', 'light');
    }
  </script>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h2>{{ __('Eliminar Categoria') }}</h2>

    <form action="/categoria/{{$dCategoriaE->id}}" method="POST">
      @csrf
      @method('DELETE')

      <div class="mb-3">
        <label for="id" class="form-label">{{ __('IdCategoria') }}</label>
        <input type="text" class="form-control" name="id" id="id" value="{{$dCategoriaE->id}}" readonly>
      </div>

      <div class="mb-3">
        <label for="nombrecat" class="form-label">{{ __('Nombre') }}</label>
        <input type="text" class="form-control" name="nombrecat" id="nombrecat" value="{{$dCategoriaE->nombrecat}}" readonly>
      </div>

      <div class="mb-3">
        <label for="descripcioncat" class="form-label">{{ __('Descripcion') }}</label>
        <input type="text" class="form-control" name="descripcioncat" id="descripcioncat" value="{{$dCategoriaE->descripcioncat}}" readonly>
      </div>

      <div class="mb-3">
        <label for="encargadocat" class="form-label">{{ __('Encargado') }}</label>
        <input type="text" class="form-control" name="encargadocat" id="encargadocat" value="{{$dCategoriaE->encargadocat}}" readonly>
      </div>

      <button type="submit" class="btn btn-danger shadow-sm">{{ __('Eliminar') }}</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary shadow-sm">{{ __('Volver') }}</a>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
