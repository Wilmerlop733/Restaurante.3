<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorias</title>
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
      <div class="d-flex align-items-center mb-4">
        <h2 class="mb-0">{{ __('Listado de Categorias') }}</h2>
        <button type="button" class="btn btn-link text-primary fs-3 p-0 ms-2 shadow-none" data-bs-toggle="modal" data-bs-target="#helpModal">
          <i class="bi bi-question-circle-fill"></i>
        </button>
      </div>
      <div class="mb-3">
        @can('crear categorias')
        <a href="/categoria/create" class="btn btn-primary shadow-sm">{{ __('Agregar Nueva Categoria') }}</a>
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
              <a href="/categoria/{{$categoria->id}}/edit" class="btn btn-success shadow-sm">{{ __('Editar') }}</a>
            </td>
            @endcan

            @can('eliminar categorias')
            <td>
              <a href="/categoria/{{$categoria->id}}" class="btn btn-danger shadow-sm">{{ __('Eliminar') }}</a>
            </td>
            @endcan
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Modal de Ayuda -->
    <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="helpModalLabel"><i class="bi bi-info-circle-fill me-2"></i> {{ __('Guía de Uso: Categorías') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-tags text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Organización del Menú') }}</h6>
                                    <p class="text-muted small">{{ __('Agrupa tus platos por tipo (ej: Entradas, Carnes, Bebidas). Esto hace que el menú sea más fácil de leer para el cliente y el mesero.') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-info-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-person-badge text-info fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Encargados') }}</h6>
                                    <p class="text-muted small">{{ __('Puedes asignar un encargado a cada categoría (ej: Barman para bebidas, Chef para cocina caliente) para llevar un mejor control.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-search text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Filtro Rápido') }}</h6>
                                    <p class="text-muted small">{{ __('Al pulsar "Ver Platos", verás solamente los productos que pertenecen a esa categoría específica.') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-pencil-square text-warning fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Mantenimiento') }}</h6>
                                    <p class="text-muted small">{{ __('Si cambias el nombre de una categoría, todos los platos asociados se actualizarán automáticamente en el sistema.') }}</p>
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
