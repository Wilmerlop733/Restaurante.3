<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Receta</title>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>Editar Receta</h1>

    <form action="/recetas/{{$recetaE->id}}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input type="text" class="form-control" name="id" id="id" value="{{$recetaE->id}}" readonly>
      </div>

      <div class="mb-3">
        <label for="idreceta" class="form-label">IdReceta</label>
        <input type="text" class="form-control" name="idreceta" id="idreceta" value="{{$recetaE->idreceta}}" required>
      </div>

      <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="text" class="form-control" name="cantidad" id="cantidad" value="{{$recetaE->cantidad}}" required>
      </div>

      <div class="mb-3">
        <label for="unidad_medida" class="form-label">Unidad de Medida</label>
        <select class="form-select" name="unidad_medida" id="unidad_medida" required>
          <option value="Gramos (g)" {{$recetaE->unidad_medida == 'Gramos (g)' ? 'selected' : ''}}>Gramos (g)</option>
          <option value="Kilogramos (kg)" {{$recetaE->unidad_medida == 'Kilogramos (kg)' ? 'selected' : ''}}>Kilogramos (kg)</option>
          <option value="Mililitros (ml)" {{$recetaE->unidad_medida == 'Mililitros (ml)' ? 'selected' : ''}}>Mililitros (ml)</option>
          <option value="Litros (L)" {{$recetaE->unidad_medida == 'Litros (L)' ? 'selected' : ''}}>Litros (L)</option>
          <option value="Libras (lb)" {{$recetaE->unidad_medida == 'Libras (lb)' ? 'selected' : ''}}>Libras (lb)</option>
          <option value="Onzas (oz)" {{$recetaE->unidad_medida == 'Onzas (oz)' ? 'selected' : ''}}>Onzas (oz)</option>
          <option value="Cucharadas" {{$recetaE->unidad_medida == 'Cucharadas' ? 'selected' : ''}}>Cucharadas</option>
          <option value="Cucharaditas" {{$recetaE->unidad_medida == 'Cucharaditas' ? 'selected' : ''}}>Cucharaditas</option>
          <option value="Tazas" {{$recetaE->unidad_medida == 'Tazas' ? 'selected' : ''}}>Tazas</option>
          <option value="Unidades" {{$recetaE->unidad_medida == 'Unidades' ? 'selected' : ''}}>Unidades</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Actualizar Receta</button>
      <a href="/recetas" class="btn btn-secondary">Volver</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
