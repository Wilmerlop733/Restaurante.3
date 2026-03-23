<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorias</title>
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
      <h2>Listado de Categorias</h2>
      <div class="mb-3">
        <a href="/" class="btn btn-secondary">Volver</a>
        <a href="/categoria/create" class="btn btn-primary ms-2">Agregar Nueva Categoria</a>
      </div>

      <table class="table">
        <thead class="table-light">
          <tr>
            <th>IdCategoria</th>
            <th>Nombre(Cat)</th>
            <th>Descripcion</th>
            <th>Encargado</th>
            <th>Ver Platos</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($dCategorias as $categoria)
          <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->nombrecat}}</td>
            <td>{{$categoria->descripcioncat}}</td>
            <td>{{$categoria->encargadocat}}</td>

            <td>
              <a href="/plato/filtro/{{$categoria->id}}" class="btn btn-primary">Ver Platos</a>
            </td>
            <td>
              <a href="/categoria/{{$categoria->id}}/edit" class="btn btn-success">Editar</a>
            </td>

            <td>
              <a href="/categoria/{{$categoria->id}}" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
