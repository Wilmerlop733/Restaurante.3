<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Ingrediente</title>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>Editar Ingrediente</h1>


    <form action="/ingredientes/{{$ingredienteE->id}}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input type="text" class="form-control" name="id" id="id" value="{{$ingredienteE->id}}" readonly>
      </div>

      <div class="mb-3">
        <label for="idingredientes" class="form-label">IdIngredientes</label>
        <input type="text" class="form-control" name="idingredientes" id="idingredientes" value="{{$ingredienteE->idingredientes}}" required>
      </div>

      <div class="mb-3">
        <label for="nombreingre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombreingre" id="nombreingre" value="{{$ingredienteE->nombreingre}}" required>
      </div>

      <div class="mb-3">
        <label for="inventario" class="form-label">Inventario</label>
        <input type="text" class="form-control" name="inventario" id="inventario" value="{{$ingredienteE->inventario}}" required>
      </div>

      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a href="/ingredientes" class="btn btn-secondary">Volver</a>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
