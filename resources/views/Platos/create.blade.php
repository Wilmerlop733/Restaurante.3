<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Crear Plato') }}</title>
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.setAttribute('data-bs-theme', 'dark');
    }
  </script>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>{{ __('Crear Plato') }}</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="/plato" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="idcategoria" class="form-label">{{ __('Categoría') }}</label>
        <select class="form-select" name="idcategoria" id="idcategoria" required>
          <option value="" disabled {{ empty($dIdcategoria) ? 'selected' : '' }}>{{ __('Seleccione una categoría') }}</option>
          @foreach($dCategorias as $cat)
            <option value="{{$cat->id}}" {{ (isset($dIdcategoria) && $dIdcategoria == $cat->id) ? 'selected' : '' }}>
              {{$cat->nombrecat}}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="nombreplato" class="form-label">{{ __('Nombre') }}</label>
        <input type="text" class="form-control" name="nombreplato" id="nombreplato" required>
      </div>

      <div class="mb-3">
        <label for="descripcionplato" class="form-label">{{ __('Descripcion') }}</label>
        <input type="text" class="form-control" name="descripcionplato" id="descripcionplato" required>
      </div>

      <div class="mb-3">
        <label for="foto" class="form-label">{{ __('Foto') }}</label>
        <input type="file" class="form-control" name="foto" id="foto" accept="image/*" required>
      </div>

      <div class="mb-3">
        <label for="niveldicultad" class="form-label">{{ __('Nivel Dificultad') }}</label>
        <select class="form-select" name="niveldicultad" id="niveldicultad" required>
          <option value="" disabled selected>{{ __('Seleccione un nivel') }}</option>
          <option value="Fácil">{{ __('Fácil') }}</option>
          <option value="Medio">{{ __('Medio') }}</option>
          <option value="Difícil">{{ __('Difícil') }}</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="precio" class="form-label">{{ __('Precio') }}</label>
        <input type="text" class="form-control" name="precio" id="precio" required>
      </div>

      <button type="submit" class="btn btn-primary shadow-sm">{{ __('Guardar Plato') }}</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary shadow-sm">{{ __('Volver') }}</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
