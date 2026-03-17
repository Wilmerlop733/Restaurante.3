<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar Receta</title>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>Eliminar Receta</h1>

    <form action="/recetas/{{$recetaE->id}}" method="POST">
      @csrf
      @method('DELETE')

      <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input type="text" class="form-control" name="id" id="id" value="{{$recetaE->id}}" readonly>
      </div>

      <div class="mb-3">
        <label for="idreceta" class="form-label">IdReceta</label>
        <input type="text" class="form-control" name="idreceta" id="idreceta" value="{{$recetaE->idreceta}}" readonly>
      </div>

      <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="text" class="form-control" name="cantidad" id="cantidad" value="{{$recetaE->cantidad}}" readonly>
      </div>

      <div class="mb-3">
        <label for="unidad_medida" class="form-label">Unidad de Medida</label>
        <input type="text" class="form-control" name="unidad_medida" id="unidad_medida" value="{{$recetaE->unidad_medida}}" readonly>
      </div>

      <button type="submit" class="btn btn-danger">Eliminar Receta</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
