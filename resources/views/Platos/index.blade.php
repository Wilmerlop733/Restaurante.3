<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platos</title>
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
          @if(isset($dInfoCategoria))
            {{ __('Platos') }}: {{$dInfoCategoria->nombrecat}}
          @else
            {{ __('Listas de Platos') }}
          @endif
        </h1>
        <button type="button" class="btn btn-link text-primary fs-3 p-0 ms-2" data-bs-toggle="modal" data-bs-target="#helpModal">
          <i class="bi bi-question-circle-fill"></i>
        </button>
      </div>

      <div class="mb-3 d-flex gap-2">
        @if(isset($dInfoCategoria))
          <a href="/categoria" class="btn btn-outline-primary shadow-sm">
            <i class="bi bi-arrow-left"></i> {{ __('Volver a Categorías') }}
          </a>
        @endif
        @can('crear platos')
          <a href="/plato/create{{ isset($dInfoCategoria) ? '?idcategoria=' . $dInfoCategoria->id : '' }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> {{ __('Crear Plato') }}
          </a>
        @endcan
      </div>

      <table class="table">
        <thead class="table-light">
          <tr>
            <th>{{ __('IdPlato') }}</th>
            <th>{{ __('Nombre(Plato)') }}</th>
            <th>{{ __('Descripcion') }}</th>
            <th>{{ __('Foto') }}</th>
            <th>{{ __('Nivel Dificultad') }}</th>
            <th>{{ __('Precio') }}</th>
            <th>{{ __('Ver Receta') }}</th>
            @can('editar platos')
            <th>{{ __('Editar') }}</th>
            @endcan
            @can('eliminar platos')
            <th>{{ __('Eliminar') }}</th>
            @endcan
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
                <img src="/Comidas/{{$plato->foto}}" class="rounded shadow-sm plato-thumb" alt="{{$plato->nombreplato}}">
              @else
                <img src="/imag/restaurante.png" class="rounded shadow-sm plato-thumb-placeholder" alt="Sin foto">
              @endif
            </td>
            <td>{{$plato->niveldicultad}}</td>
            <td>L. {{$plato->precio}}</td>

            <td>
              <a href="/receta/filtro/{{$plato->id}}" class="btn btn-primary shadow-sm">{{ __('Ver Receta') }}</a>
            </td>

            @can('editar platos')
            <td>
              <a href="/plato/{{$plato->id}}/edit" class="btn btn-success shadow-sm">
                <i class="bi bi-pencil"></i> {{ __('Editar') }}
              </a>
            </td>
            @endcan

            @can('eliminar platos')
            <td>
              <a href="/plato/{{$plato->id}}" class="btn btn-danger shadow-sm">
                <i class="bi bi-trash"></i> {{ __('Eliminar') }}
              </a>
            </td>
            @endcan
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>

    @include('Guias.platos')
  </body>
</html>
