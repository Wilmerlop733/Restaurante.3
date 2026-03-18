<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingredientes</title>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h1>Listas de Ingredientes</h1>

      <a href="/" class="btn btn-secondary mb-3">Volver al Menú</a>
      <a href="/ingredientes/create" class="btn btn-primary mb-3">Crear Ingrediente</a>

      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Inventario</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($resultado as $ingrediente)
          <tr>
            <td>{{$ingrediente->id}}</td>
            <td>{{$ingrediente->nombreingre}}</td>
            <td>{{$ingrediente->inventario}}</td>

            <td>
              <a href="/ingredientes/{{$ingrediente->id}}/edit" class="btn btn-success">Editar</a>
            </td>

            <td>
              <a href="/ingredientes/{{$ingrediente->id}}" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
