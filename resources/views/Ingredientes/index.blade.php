<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingredientes</title>
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.setAttribute('data-bs-theme', 'dark');
    }
  </script>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/theme.css">
  </head>

  <body>
    <div class="container mt-5">

      <h1>Listas de Ingredientes</h1>

      <div class="mb-3">
        <a href="/" class="btn btn-secondary">Volver</a>
        <a href="/ingrediente/create" class="btn btn-primary ms-2">Crear Ingrediente</a>
      </div>

      <table class="table">
        <thead class="table-light">
          <tr>
            <th>IdIngrediente</th>
            <th>Nombre</th>
            <th>Inventario</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($dIngredientes as $ingrediente)
          <tr>
            <td>{{$ingrediente->id}}</td>
            <td>{{$ingrediente->nombreingre}}</td>
            <td>{{$ingrediente->inventario}}</td>

            <td>
              <a href="/ingrediente/{{$ingrediente->id}}/edit" class="btn btn-success">Editar</a>
            </td>

            <td>
              <a href="/ingrediente/{{$ingrediente->id}}" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
