<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Receta</title>
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
    <h1>Crear Receta</h1>

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
        <label for="idplato" class="form-label">Plato</label>
        <select class="form-select" name="idplato" id="idplato" required>
          <option value="" disabled {{ !isset($dIdplato) ? 'selected' : '' }}>Seleccione un plato</option>
          @foreach($dPlatos as $plato)
            <option value="{{$plato->id}}" {{ (isset($dIdplato) && $dIdplato == $plato->id) ? 'selected' : '' }}>
              {{$plato->nombreplato}}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="idingredientes" class="form-label">Ingrediente</label>
        <select class="form-select" name="idingredientes" id="idingredientes" required>
          <option value="" disabled selected>Seleccione un ingrediente</option>
          @foreach($dIngredientes as $ingre)
            <option value="{{$ingre->id}}">{{$ingre->nombreingre}}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="text" class="form-control" name="cantidad" id="cantidad" required>
      </div>

      <div class="mb-3">
        <label for="unidad_medida" class="form-label">Unidad de Medida</label>
        <select class="form-select" name="unidad_medida" id="unidad_medida" required>
          <option value="" disabled selected>Seleccione una unidad</option>
          <option value="Gramos (g)">Gramos (g)</option>
          <option value="Kilogramos (kg)">Kilogramos (kg)</option>
          <option value="Mililitros (ml)">Mililitros (ml)</option>
          <option value="Litros (L)">Litros (L)</option>
          <option value="Libras (lb)">Libras (lb)</option>
          <option value="Onzas (oz)">Onzas (oz)</option>
          <option value="Cucharadas">Cucharadas</option>
          <option value="Cucharaditas">Cucharaditas</option>
          <option value="Tazas">Tazas</option>
          <option value="Unidades">Unidades</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Guardar Receta</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary">Volver</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
