<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Plato</title>
  <link rel="icon" href="/restaurante.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h1>Editar Plato</h1>

    <form action="/platos/{{$platoE->id}}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input type="text" class="form-control" name="id" id="id" value="{{$platoE->id}}" readonly>
      </div>

      <div class="mb-3">
        <label for="idplato" class="form-label">IdPlato</label>
        <input type="text" class="form-control" name="idplato" id="idplato" value="{{$platoE->idplato}}" required>
      </div>

      <div class="mb-3">
        <label for="nombreplato" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombreplato" id="nombreplato" value="{{$platoE->nombreplato}}" required>
      </div>

      <div class="mb-3">
        <label for="descripcionplato" class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="descripcionplato" id="descripcionplato" value="{{$platoE->descripcionplato}}" required>
      </div>

      <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <select class="form-select" name="foto" id="foto" required>
          @foreach($imagenes as $imagen)
            <option value="{{$imagen}}" {{$platoE->foto == $imagen ? 'selected' : ''}}>{{$imagen}}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="niveldicultad" class="form-label">Nivel Dificultad</label>
        <select class="form-select" name="niveldicultad" id="niveldicultad" required>
          <option value="Fácil" {{$platoE->niveldicultad == 'Fácil' ? 'selected' : ''}}>Fácil</option>
          <option value="Medio" {{$platoE->niveldicultad == 'Medio' ? 'selected' : ''}}>Medio</option>
          <option value="Difícil" {{$platoE->niveldicultad == 'Difícil' ? 'selected' : ''}}>Difícil</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="text" class="form-control" name="precio" id="precio" value="{{$platoE->precio}}" required>
      </div>

      <button type="submit" class="btn btn-primary">Actualizar Plato</button>
      <a href="/platos" class="btn btn-secondary">Volver</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
