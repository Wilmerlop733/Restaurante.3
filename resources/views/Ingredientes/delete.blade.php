<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Eliminar Ingrediente') }}</title>
  <script src="{{ asset('js/theme-head.js') }}"></script>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>{{ __('¿Desea eliminar este registro?') }}</h1>

    <form action="/ingrediente/{{$dIngredienteE->id}}" method="POST">
      @csrf
      @method('DELETE')

      <div class="mb-3">
        <label for="id" class="form-label">{{ __('Id') }}</label>
        <input type="text" class="form-control" name="id" id="id" value="{{$dIngredienteE->id}}" readonly>
      </div>



      <div class="mb-3">
        <label for="nombreingre" class="form-label">{{ __('Nombre') }}</label>
        <input type="text" class="form-control" name="nombreingre" id="nombreingre" value="{{$dIngredienteE->nombreingre}}" readonly>
      </div>

      <div class="mb-3">
        <label for="inventario" class="form-label">{{ __('Inventario') }}</label>
        <input type="text" class="form-control" name="inventario" id="inventario" value="{{$dIngredienteE->inventario}}" readonly>
      </div>

      <button type="submit" class="btn btn-danger shadow-sm">{{ __('Eliminar Ingrediente') }}</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary shadow-sm">{{ __('Volver') }}</a>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
