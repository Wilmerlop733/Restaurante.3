<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorias</title>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container mt-5">
    <h2>Listado de Categorias</h2>
    <a href="/" class="btn btn-secondary mb-3">Volver al Menú</a>
    <a href="/categorias/create" class="btn btn-primary mb-3">Agregar Nueva Categoria</a>

      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Nombre(Cat)</th>
            <th>Descripcion</th>
            <th>Encargado</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($resultado as $categoria)
          <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->nombrecat}}</td>
            <td>{{$categoria->descripcioncat}}</td>
            <td>{{$categoria->encargadocat}}</td>

            <td>
              <a href="/categorias/{{$categoria->id}}/edit" class="btn btn-success">Editar</a>
            </td>

            <td>
              <a href="/categorias/{{$categoria->id}}" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
