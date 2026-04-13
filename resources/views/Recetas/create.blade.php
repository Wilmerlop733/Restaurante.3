<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Crear Receta') }}</title>
  <script src="{{ asset('js/theme-head.js') }}"></script>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>{{ __('Crear Receta') }}</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="/receta" method="POST">
      @csrf

      <div class="mb-3">
        <label for="idplato" class="form-label">{{ __('Plato') }}</label>
        <select class="form-select" name="idplato" id="idplato" required>
          <option value="" disabled {{ !isset($dIdplato) ? 'selected' : '' }}>{{ __('Seleccione un plato') }}</option>
          @foreach($dPlatos as $plato)
            <option value="{{$plato->id}}" {{ (isset($dIdplato) && $dIdplato == $plato->id) ? 'selected' : '' }}>
              {{$plato->nombreplato}}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="idingredientes" class="form-label">{{ __('Ingrediente') }}</label>
        <select class="form-select" name="idingredientes" id="idingredientes" required>
          <option value="" disabled selected>{{ __('Seleccione un ingrediente') }}</option>
          @foreach($dIngredientes as $ingre)
            <option value="{{$ingre->id}}">{{$ingre->nombreingre}}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="cantidad" class="form-label">{{ __('Cantidad') }}</label>
        <input type="text" class="form-control" name="cantidad" id="cantidad" required>
      </div>

      <div class="mb-3">
        <label for="unidad_medida" class="form-label">{{ __('Unidad de Medida') }}</label>
        <select class="form-select" name="unidad_medida" id="unidad_medida" required>
          <option value="" disabled selected>{{ __('Seleccione una unidad') }}</option>
          <option value="Gramos (g)">{{ __('Gramos (g)') }}</option>
          <option value="Kilogramos (kg)">{{ __('Kilogramos (kg)') }}</option>
          <option value="Mililitros (ml)">{{ __('Mililitros (ml)') }}</option>
          <option value="Litros (L)">{{ __('Litros (L)') }}</option>
          <option value="Libras (lb)">{{ __('Libras (lb)') }}</option>
          <option value="Onzas (oz)">{{ __('Onzas (oz)') }}</option>
          <option value="Cucharadas">{{ __('Cucharadas') }}</option>
          <option value="Cucharaditas">{{ __('Cucharaditas') }}</option>
          <option value="Tazas">{{ __('Tazas') }}</option>
          <option value="Unidades">{{ __('Unidades') }}</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary shadow-sm">{{ __('Guardar Receta') }}</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary shadow-sm">{{ __('Volver') }}</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
