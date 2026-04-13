<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Crear Categoria') }}</title>
  <script src="{{ asset('js/theme-head.js') }}"></script>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h2>{{ __('Agregar Nueva Categoria') }}</h2>

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
        <label for="nombrecat" class="form-label">{{ __('Nombre') }}</label>
        <input type="text" class="form-control" name="nombrecat" id="nombrecat" required>
      </div>

      <div class="mb-3">
        <label for="descripcioncat" class="form-label">{{ __('Descripcion') }}</label>
        <input type="text" class="form-control" name="descripcioncat" id="descripcioncat" required>
      </div>

      <div class="mb-3">
        <label for="encargadocat" class="form-label">{{ __('Encargado') }}</label>
        <input type="text" class="form-control" name="encargadocat" id="encargadocat" required>
      </div>

      <button type="submit" class="btn btn-primary shadow-sm">{{ __('Guardar') }}</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary shadow-sm">{{ __('Volver') }}</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
