<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recetas</title>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container mt-5">
      <h1>Listas de Recetas</h1>

      <a href="/" class="btn btn-secondary mb-3">Volver al Menú</a>
      <a href="/recetas/create" class="btn btn-primary mb-3">Crear Receta</a>

      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Cantidad</th>
            <th>Unidad de Medida</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($resultado as $receta)
          <tr>
            <td>{{$receta->id}}</td>
            <td>{{$receta->cantidad}}</td>
            <td>{{$receta->unidad_medida}}</td>

            <td>
              <a href="/recetas/{{$receta->id}}/edit" class="btn btn-success">Editar</a>
            </td>

            <td>
              <a href="/recetas/{{$receta->id}}" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
