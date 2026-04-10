<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Editar Receta') }}</title>
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
    <h1>{{ __('Editar Receta') }}</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="/receta/{{$dRecetaE->id}}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="idplato" class="form-label">{{ __('Plato') }}</label>
        <select class="form-select" name="idplato" id="idplato" required>
          @foreach($dPlatos as $plato)
            <option value="{{$plato->id}}" {{$dRecetaE->idplato == $plato->id ? 'selected' : ''}}>
              {{$plato->nombreplato}}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="idingredientes" class="form-label">{{ __('Ingrediente') }}</label>
        <select class="form-select" name="idingredientes" id="idingredientes" required>
          @foreach($dIngredientes as $ingre)
            <option value="{{$ingre->id}}" {{$dRecetaE->idingredientes == $ingre->id ? 'selected' : ''}}>
              {{$ingre->nombreingre}}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="cantidad" class="form-label">{{ __('Cantidad') }}</label>
        <input type="text" class="form-control" name="cantidad" id="cantidad" value="{{$dRecetaE->cantidad}}" required>
      </div>

      <div class="mb-3">
        <label for="unidad_medida" class="form-label">{{ __('Unidad de Medida') }}</label>
        <select class="form-select" name="unidad_medida" id="unidad_medida" required>
          <option value="Gramos (g)" {{$dRecetaE->unidad_medida == 'Gramos (g)' ? 'selected' : ''}}>{{ __('Gramos (g)') }}</option>
          <option value="Kilogramos (kg)" {{$dRecetaE->unidad_medida == 'Kilogramos (kg)' ? 'selected' : ''}}>{{ __('Kilogramos (kg)') }}</option>
          <option value="Mililitros (ml)" {{$dRecetaE->unidad_medida == 'Mililitros (ml)' ? 'selected' : ''}}>{{ __('Mililitros (ml)') }}</option>
          <option value="Litros (L)" {{$dRecetaE->unidad_medida == 'Litros (L)' ? 'selected' : ''}}>{{ __('Litros (L)') }}</option>
          <option value="Libras (lb)" {{$dRecetaE->unidad_medida == 'Libras (lb)' ? 'selected' : ''}}>{{ __('Libras (lb)') }}</option>
          <option value="Onzas (oz)" {{$dRecetaE->unidad_medida == 'Onzas (oz)' ? 'selected' : ''}}>{{ __('Onzas (oz)') }}</option>
          <option value="Cucharadas" {{$dRecetaE->unidad_medida == 'Cucharadas' ? 'selected' : ''}}>{{ __('Cucharadas') }}</option>
          <option value="Cucharaditas" {{$dRecetaE->unidad_medida == 'Cucharaditas' ? 'selected' : ''}}>{{ __('Cucharaditas') }}</option>
          <option value="Tazas" {{$dRecetaE->unidad_medida == 'Tazas' ? 'selected' : ''}}>{{ __('Tazas') }}</option>
          <option value="Unidades" {{$dRecetaE->unidad_medida == 'Unidades' ? 'selected' : ''}}>{{ __('Unidades') }}</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary shadow-sm">{{ __('Actualizar Receta') }}</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary shadow-sm">{{ __('Volver') }}</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
