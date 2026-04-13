<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Editar Ingrediente') }}</title>
  <script src="{{ asset('js/theme-head.js') }}"></script>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>{{ __('Editar Ingrediente') }}</h1>


    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="/ingrediente/{{$dIngredienteE->id}}" method="POST">
      @csrf
      @method('PUT')


      <div class="mb-3">
        <label for="nombreingre" class="form-label">{{ __('Nombre') }}</label>
        <input type="text" class="form-control" name="nombreingre" id="nombreingre" value="{{$dIngredienteE->nombreingre}}" required>
      </div>

      @php
        $partes = explode(' ', $dIngredienteE->inventario, 2);
        $cantidad = $partes[0] ?? '';
        $unidad = $partes[1] ?? '';
      @endphp

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="cantidad" class="form-label">{{ __('Cantidad en Inventario') }}</label>
          <input type="number" step="0.01" class="form-control" name="cantidad" id="cantidad" value="{{ $cantidad }}" required>
        </div>
        <div class="col-md-6">
          <label for="unidad_medida" class="form-label">{{ __('Unidad de Medida') }}</label>
          <select class="form-select" name="unidad_medida" id="unidad_medida" required>
            <option value="kg" {{ $unidad == 'kg' ? 'selected' : '' }}>{{ __('Kilogramos (kg)') }}</option>
            <option value="g" {{ $unidad == 'g' ? 'selected' : '' }}>{{ __('Gramos (g)') }}</option>
            <option value="L" {{ $unidad == 'L' ? 'selected' : '' }}>{{ __('Litros (L)') }}</option>
            <option value="ml" {{ $unidad == 'ml' ? 'selected' : '' }}>{{ __('Mililitros (ml)') }}</option>
            <option value="unidades" {{ $unidad == 'unidades' ? 'selected' : '' }}>{{ __('Unidades') }}</option>
            <option value="libras" {{ $unidad == 'libras' ? 'selected' : '' }}>{{ __('Libras') }}</option>
            <option value="onzas" {{ $unidad == 'onzas' ? 'selected' : '' }}>{{ __('Onzas') }}</option>
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary shadow-sm">{{ __('Actualizar') }}</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary shadow-sm">{{ __('Volver') }}</a>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
