<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recetas</title>
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.setAttribute('data-bs-theme', 'dark');
    } else {
      document.documentElement.setAttribute('data-bs-theme', 'light');
    }
  </script>
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

    <!-- Modal de Ayuda -->
    <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="helpModalLabel"><i class="bi bi-info-circle-fill me-2"></i> {{ __('Guía de Uso: Recetas') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-egg-fried text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Composición del Plato') }}</h6>
                                    <p class="text-muted small">{{ __('Aquí defines cuánta cantidad de cada ingrediente se gasta al preparar este plato. Es la "fórmula" de tu cocina.') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-calculator text-warning fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Descuento Automático') }}</h6>
                                    <p class="text-muted small">{{ __('Cuando un mesero vende un plato, el sistema mira esta receta y descuenta automáticamente los ingredientes del inventario.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-plus-circle text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Crea tu Menú') }}</h6>
                                    <p class="text-muted small">{{ __('Si agregas un ingrediente nuevo, asegúrate de asignarle la cantidad exacta (ej: 0.5 kg de carne) para que las cuentas sean precisas.') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-trash-fill text-danger fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Eliminar con Cuidado') }}</h6>
                                    <p class="text-muted small">{{ __('Si quitas un ingrediente de la receta, el sistema dejará de descontarlo del stock cuando se venda el plato.') }}</p>
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
