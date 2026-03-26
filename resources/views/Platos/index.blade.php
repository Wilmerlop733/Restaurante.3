<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platos</title>
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.setAttribute('data-bs-theme', 'dark');
    } else {
      document.documentElement.setAttribute('data-bs-theme', 'light');
    }
  </script>
  <script src="https://unpkg.com/@hotwired/turbo@7.1.0/dist/turbo.es2017-umd.js"></script>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/theme.css">
  </head>

  <body>
    <div class="container mt-5">

      @if(isset($dInfoCategoria))
        <h1>Listas de Platos para la Categoría: {{$dInfoCategoria->nombrecat}}</h1>
      @else
        <h1>Listas de Platos</h1>
      @endif

      <div class="mb-3">
        @if(isset($dInfoCategoria))
          <a href="/categoria" class="btn btn-secondary">Volver</a>
        @else
          <a href="/" class="btn btn-secondary">Volver</a>
        @endif
        <a href="/plato/create{{ isset($dInfoCategoria) ? '?idcategoria=' . $dInfoCategoria->id : '' }}" class="btn btn-primary ms-2">Crear Plato</a>
      </div>

      <table class="table">
        <thead class="table-light">
          <tr>
            <th>IdPlato</th>
            <th>Nombre(Plato)</th>
            <th>Descripcion</th>
            <th>Foto</th>
            <th>Nivel Dificultad</th>
            <th>Precio</th>
            <th>Ver Receta</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($dPlatos as $plato)
          @if(!isset($dInfoCategoria) || $plato->idcategoria == $dInfoCategoria->id)
          <tr>
            <td>{{$plato->id}}</td>
            <td>{{$plato->nombreplato}}</td>
            <td>{{$plato->descripcionplato}}</td>
            <td>
              @if($plato->foto)
                <img src="/Comidas/{{$plato->foto}}" class="rounded shadow-sm" style="width: 80px; height: 60px; object-fit: cover;" alt="{{$plato->nombreplato}}">
              @else
                <img src="/imag/restaurante.png" class="rounded shadow-sm" style="width: 80px; height: 60px; object-fit: cover; opacity: 0.5;" alt="Sin foto">
              @endif
            </td>
            <td>{{$plato->niveldicultad}}</td>
            <td>L. {{$plato->precio}}</td>

            <td>
              <a href="/receta/filtro/{{$plato->id}}" class="btn btn-primary">Ver Receta</a>
            </td>

            <td>
              <a href="/plato/{{$plato->id}}/edit" class="btn btn-success">Editar</a>
            </td>

            <td>
              <a href="/plato/{{$plato->id}}" class="btn btn-danger">Eliminar</a>
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
