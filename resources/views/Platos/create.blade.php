<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Plato</title>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>Crear Plato</h1>

    <form action="/platos" method="POST">
      @csrf

      <div class="mb-3">
        <label for="idplato" class="form-label">IdPlato</label>
        <input type="text" class="form-control" name="idplato" id="idplato" required>
      </div>

      <div class="mb-3">
        <label for="nombreplato" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombreplato" id="nombreplato" required>
      </div>

      <div class="mb-3">
        <label for="descripcionplato" class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="descripcionplato" id="descripcionplato" required>
      </div>

      <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <select class="form-select" name="foto" id="foto" required>
          <option value="" disabled selected>Seleccione una imagen</option>
          @foreach($imagenes as $imagen)
            <option value="{{$imagen}}">{{$imagen}}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="niveldicultad" class="form-label">Nivel Dificultad</label>
        <select class="form-select" name="niveldicultad" id="niveldicultad" required>
          <option value="" disabled selected>Seleccione un nivel</option>
          <option value="Fácil">Fácil</option>
          <option value="Medio">Medio</option>
          <option value="Difícil">Difícil</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="text" class="form-control" name="precio" id="precio" required>
      </div>

      <button type="submit" class="btn btn-primary">Guardar Plato</button>
      <a href="/platos" class="btn btn-secondary">Volver</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
