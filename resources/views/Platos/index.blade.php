<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platos</title>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h1>Listas de Platos</h1>

      <a href="/" class="btn btn-secondary mb-3">Volver al Menú</a>
      <a href="/platos/create" class="btn btn-primary mb-3">Crear Plato</a>

      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Nombre(Plato)</th>
            <th>Descripcion</th>
            <th>Foto</th>
            <th>Nivel Dificultad</th>
            <th>Precio</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach($resultado as $plato)
          <tr>
            <td>{{$plato->id}}</td>
            <td>{{$plato->nombreplato}}</td>
            <td>{{$plato->descripcionplato}}</td>
            <td>
              @if($plato->foto)
                <img src="/comidas/{{$plato->foto}}" class="rounded shadow-sm" style="width: 80px; height: 60px; object-fit: cover;" alt="{{$plato->nombreplato}}">
              @else
                <img src="/imag/restaurante.png" class="rounded shadow-sm" style="width: 80px; height: 60px; object-fit: cover; opacity: 0.5;" alt="Sin foto">
              @endif
            </td>
            <td>{{$plato->niveldicultad}}</td>
            <td>L. {{$plato->precio}}</td>

            <td>
              <a href="/platos/{{$plato->id}}/edit" class="btn btn-success">Editar</a>
            </td>

            <td>
              <a href="/platos/{{$plato->id}}" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
