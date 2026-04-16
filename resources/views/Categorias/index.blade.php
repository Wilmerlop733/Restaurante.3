<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorias</title>
    <script src="{{ asset('js/theme-head.js') }}"></script>
  <script src="https://unpkg.com/@hotwired/turbo@7.1.0/dist/turbo.es2017-umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/theme.css">
  </head>

  <body>
    <div class="container page-container">
      @include('Partes.navbar')
      <div class="d-flex align-items-center mb-4">
        <h2 class="mb-0">{{ __('Listado de Categorias') }}</h2>
        <button type="button" class="btn btn-link text-primary fs-3 p-0 ms-2 shadow-none" data-bs-toggle="modal" data-bs-target="#helpModal">
          <i class="bi bi-question-circle-fill"></i>
        </button>
      </div>
      <div class="mb-3">
        @can('crear categorias')
        <a href="/categoria/create" class="btn btn-primary shadow-sm">
          <i class="bi bi-plus-circle"></i> {{ __('Agregar Categoria') }}
        </a>
        @endcan
      </div>

      <table class="table">
        <thead class="table-light">
          <tr>
            <th>{{ __('IdCategoria') }}</th>
            <th>{{ __('Nombre(Cat)') }}</th>
            <th>{{ __('Descripcion') }}</th>
            <th>{{ __('Encargado') }}</th>
            <th>{{ __('Ver Platos') }}</th>
            @can('editar categorias')
            <th>{{ __('Editar') }}</th>
            @endcan
            @can('eliminar categorias')
            <th>{{ __('Eliminar') }}</th>
            @endcan
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
              <a href="/plato/filtro/{{$categoria->id}}" class="btn btn-primary shadow-sm">{{ __('Ver Platos') }}</a>
            </td>
            
            @can('editar categorias')
            <td>
              <a href="/categoria/{{$categoria->id}}/edit" class="btn btn-success shadow-sm">
                <i class="bi bi-pencil"></i> {{ __('Editar') }}
              </a>
            </td>
            @endcan

            @can('eliminar categorias')
            <td>
              <a href="/categoria/{{$categoria->id}}" class="btn btn-danger shadow-sm">
                <i class="bi bi-trash"></i> {{ __('Eliminar') }}
              </a>
            </td>
            @endcan
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @include('Guias.categorias')
  </body>
</html>
