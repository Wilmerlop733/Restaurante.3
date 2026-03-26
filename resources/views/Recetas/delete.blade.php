<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar Receta</title>
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
    <h1>Eliminar Receta</h1>

    <form action="/receta/{{$dRecetaE->id}}" method="POST">
      @csrf
      @method('DELETE')

      <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input type="text" class="form-control" name="id" id="id" value="{{$dRecetaE->id}}" readonly>
      </div>

      <div class="mb-3">
        <label for="plato" class="form-label">Plato</label>
        @php $plato = \App\Models\Plato::find($dRecetaE->idplato); @endphp
        <input type="text" class="form-control" id="plato" value="{{ $plato ? $plato->nombreplato : 'N/A' }}" readonly>
      </div>

      <div class="mb-3">
        <label for="ingrediente" class="form-label">Ingrediente</label>
        @php $ingrediente = \App\Models\Ingrediente::find($dRecetaE->idingredientes); @endphp
        <input type="text" class="form-control" id="ingrediente" value="{{ $ingrediente ? $ingrediente->nombreingre : 'N/A' }}" readonly>
      </div>

      <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="text" class="form-control" name="cantidad" id="cantidad" value="{{$dRecetaE->cantidad}} {{$dRecetaE->unidad_medida}}" readonly>
      </div>

      <button type="submit" class="btn btn-danger">Quitar Receta</button>
      <a href="#" onclick="history.back()" class="btn btn-secondary">Volver</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
