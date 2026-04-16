<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recetas</title>
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
      <div class="d-flex align-items-center mb-4 text-center text-md-start">
        <h1 class="mb-0">
          @if(isset($dInfoPlato))
            {{ __('Receta para') }}: {{$dInfoPlato->nombreplato}}
          @else
            {{ __('Listas de Recetas') }}
          @endif
        </h1>
        <button type="button" class="btn btn-link text-primary fs-3 p-0 ms-2" data-bs-toggle="modal" data-bs-target="#helpModal">
          <i class="bi bi-question-circle-fill"></i>
        </button>
      </div>

      <div class="mb-3 d-flex gap-2">
        @if(isset($dInfoPlato))
          <a href="/plato/filtro/{{ $dInfoPlato->idcategoria }}" class="btn btn-outline-primary shadow-sm">
            <i class="bi bi-arrow-left"></i> {{ __('Volver a Platos') }}
          </a>
        @endif
        <a href="/receta/create{{ isset($dInfoPlato) ? '?idplato=' . $dInfoPlato->id : '' }}" class="btn btn-primary shadow-sm">
          <i class="bi bi-plus-circle"></i> {{ __('Crear Receta') }}
        </a>
      </div>

      <table class="table">
        <thead class="table-light">
          <tr>
            <th>{{ __('IdReceta') }}</th>
            <th>{{ __('Ingrediente') }}</th>
            <th>{{ __('Cantidad') }}</th>
            <th>{{ __('Unidad de Medida') }}</th>
            <th>{{ __('Editar') }}</th>
            <th>{{ __('Quitar') }}</th>
          </tr>
        </thead>

        <tbody>
          @foreach($dRecetas as $receta)
          @if(!isset($dInfoPlato) || $receta->idplato == $dInfoPlato->id)
          <tr>
            <td>{{$receta->id}}</td>
            <td>
              {{ $receta->ingrediente ? $receta->ingrediente->nombreingre : 'N/A (ID: ' . $receta->idingredientes . ')' }}
            </td>
            <td>{{$receta->cantidad}}</td>
            <td>{{$receta->unidad_medida}}</td>

            <td>
              <a href="/receta/{{$receta->id}}/edit" class="btn btn-success shadow-sm">
                <i class="bi bi-pencil"></i> {{ __('Editar') }}
              </a>
            </td>

            <td>
              <a href="/receta/{{$receta->id}}" class="btn btn-danger shadow-sm">
                <i class="bi bi-trash"></i> {{ __('Quitar') }}
              </a>
            </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>

    @include('Guias.recetas')
  </body>
</html>
