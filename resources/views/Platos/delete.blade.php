<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar Plato</title>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>Eliminar Plato</h1>

    <form action="/platos/{{$platoE->id}}" method="POST">
      @csrf
      @method('DELETE')

      <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input type="text" class="form-control" name="id" id="id" value="{{$platoE->id}}" readonly>
      </div>

      <div class="mb-3">
        <label for="idplato" class="form-label">IdPlato</label>
        <input type="text" class="form-control" name="idplato" id="idplato" value="{{$platoE->idplato}}" readonly>
      </div>

      <div class="mb-3">
        <label for="nombreplato" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombreplato" id="nombreplato" value="{{$platoE->nombreplato}}" readonly>
      </div>

      <div class="mb-3">
        <label for="descripcionplato" class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="descripcionplato" id="descripcionplato" value="{{$platoE->descripcionplato}}" readonly>
      </div>

      <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="text" class="form-control" name="foto" id="foto" value="{{$platoE->foto}}" readonly>
      </div>

      <div class="mb-3">
        <label for="niveldicultad" class="form-label">Nivel Dificultad</label>
        <input type="text" class="form-control" name="niveldicultad" id="niveldicultad" value="{{$platoE->niveldicultad}}" readonly>
      </div>

      <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="text" class="form-control" name="precio" id="precio" value="{{$platoE->precio}}" readonly>
      </div>

      <button type="submit" class="btn btn-danger">Eliminar Plato</button>
      <a href="/platos" class="btn btn-secondary">Volver</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
