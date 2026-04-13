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
  <div class="container" style="margin-top: 1.25rem !important;">

      @include('partials.navbar')
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
                <img src="/Comidas/{{$plato->foto}}" class="rounded shadow-sm" style="width: 80px; height: 60px; object-fit: cover;" alt="{{$plato->nombreplato}}">
              @else
                <img src="/imag/restaurante.png" class="rounded shadow-sm" style="width: 80px; height: 60px; object-fit: cover; opacity: 0.5;" alt="Sin foto">
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

    <!-- Modal de Ayuda -->
    <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="helpModalLabel"><i class="bi bi-info-circle-fill me-2"></i> {{ __('Guía de Uso: Menú de Platos') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-card-list text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Catálogo de Comidas') }}</h6>
                                    <p class="text-muted small">{{ __('Este es el corazón de tu menú. Aquí puedes ver todos los platos que ofreces, sus fotos, descripciones y precios.') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-info-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-journal-text text-info fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Ver Receta') }}</h6>
                                    <p class="text-muted small">{{ __('Pulsa "Ver Receta" para saber qué ingredientes lleva cada plato y en qué cantidades se utilizan.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-currency-dollar text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Precios y Dificultad') }}</h6>
                                    <p class="text-muted small">{{ __('Controla el precio de venta y el nivel de dificultad para que los cocineros sepan la complejidad de la preparación.') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-image text-warning fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Fotos Reales') }}</h6>
                                    <p class="text-muted small">{{ __('Asegúrate de subir fotos atractivas. Una buena imagen ayuda al mesero a vender mejor el plato al cliente.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">{{ __('Entendido') }}</button>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>
