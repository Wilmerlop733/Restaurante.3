<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recetas</title>
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

      @if(isset($dInfoPlato))
        <h1>Receta para el Plato: {{$dInfoPlato->nombreplato}}</h1>
      @else
        <h1>Listas de Recetas</h1>
      @endif

      <div class="mb-3">
        <a href="/plato" class="btn btn-secondary">Volver</a>
        <a href="/receta/create{{ isset($dInfoPlato) ? '?idplato=' . $dInfoPlato->id : '' }}" class="btn btn-primary ms-2">Crear Receta</a>
      </div>

      <table class="table">
        <thead class="table-light">
          <tr>
            <th>IdReceta</th>
            <th>Ingrediente</th>
            <th>Cantidad</th>
            <th>Unidad de Medida</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($dRecetas as $receta)
          @if(!isset($dInfoPlato) || $receta->idplato == $dInfoPlato->id)
          <tr>
            <td>{{$receta->id}}</td>
            <td>
              @php
                $ingrediente = $dIngredientes->firstWhere('id', $receta->idingredientes);
              @endphp
              {{ $ingrediente ? $ingrediente->nombreingre : 'N/A' }}
            </td>
            <td>{{$receta->cantidad}}</td>
            <td>{{$receta->unidad_medida}}</td>

            <td>
              <a href="/receta/{{$receta->id}}/edit" class="btn btn-success">Editar</a>
            </td>

            <td>
              <a href="/receta/{{$receta->id}}" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
