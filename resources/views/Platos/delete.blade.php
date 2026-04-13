<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Eliminar Plato') }}</title>
  <script src="{{ asset('js/theme-head.js') }}"></script>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>{{ __('¿Desea eliminar este registro?') }}</h1>

    <form action="/plato/{{$dPlatoE->id}}" method="POST">
      @csrf
      @method('DELETE')

      <div class="mb-3">
        <label for="id" class="form-label">{{ __('Id') }}</label>
        <input type="text" class="form-control" name="id" id="id" value="{{$dPlatoE->id}}" readonly>
      </div>

      <div class="mb-3">
        <label for="idcategoria" class="form-label">{{ __('Id de Categoría') }}</label>
        <input type="text" class="form-control" name="idcategoria" id="idcategoria" value="{{$dPlatoE->idcategoria}}" readonly>
      </div>

      <div class="mb-3">
        <label for="nombreplato" class="form-label">{{ __('Nombre') }}</label>
        <input type="text" class="form-control" name="nombreplato" id="nombreplato" value="{{$dPlatoE->nombreplato}}" readonly>
      </div>

      <div class="mb-3">
        <label for="descripcionplato" class="form-label">{{ __('Descripcion') }}</label>
        <input type="text" class="form-control" name="descripcionplato" id="descripcionplato" value="{{$dPlatoE->descripcionplato}}" readonly>
      </div>

      <div class="mb-3">
        <label for="foto" class="form-label">{{ __('Foto') }}</label>
        <input type="text" class="form-control" name="foto" id="foto" value="{{$dPlatoE->foto}}" readonly>
      </div>

      <div class="mb-3">
        <label for="niveldicultad" class="form-label">{{ __('Nivel Dificultad') }}</label>
        <input type="text" class="form-control" name="niveldicultad" id="niveldicultad" value="{{$dPlatoE->niveldicultad}}" readonly>
      </div>

      <div class="mb-3">
        <label for="precio" class="form-label">{{ __('Precio') }}</label>
        <input type="text" class="form-control" name="precio" id="precio" value="{{$dPlatoE->precio}}" readonly>
      </div>

      <button type="submit" class="btn btn-danger shadow-sm">{{ __('Eliminar Plato') }}</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary shadow-sm">{{ __('Volver') }}</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
