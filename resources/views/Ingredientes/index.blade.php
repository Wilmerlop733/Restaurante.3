<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingredientes</title>
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
    <link rel="stylesheet" href="/css/theme.css?v=1.1">
</head>

<body>
    <div class="container" style="margin-top: 1.25rem !important;">

        @include('partials.navbar')
        <div class="d-flex align-items-center mb-4">
            <h1 class="mb-0">{{ __('Listas de Ingredientes') }}</h1>
            <button type="button" class="btn btn-link text-primary fs-3 p-0 ms-2" data-bs-toggle="modal" data-bs-target="#helpModal">
                <i class="bi bi-question-circle-fill"></i>
            </button>
        </div>

        <div class="mb-3">
            <a href="/ingrediente/create" class="btn btn-primary shadow-sm">{{ __('Crear Ingrediente') }}</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>{{ __('IdIngrediente') }}</th>
                    <th>{{ __('Nombre') }}</th>
                    <th>{{ __('Inventario') }}</th>
                    <th class="text-center">{{ __('Surtir') }}</th> 
                    <th>{{ __('Editar') }}</th>
                    <th>{{ __('Eliminar') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($dIngredientes as $ingrediente)
                <tr>
                    <td>{{ $ingrediente->id }}</td>
                    <td>{{ $ingrediente->nombreingre }}</td>
                    <td>{{ $ingrediente->inventario }} {{ $ingrediente->unidad_medida }}</td>

                    <td class="text-center">
                        <button type="button" class="btn btn-info btn-sm text-white shadow-sm" data-bs-toggle="modal" data-bs-target="#modalStock{{ $ingrediente->id }}">
                            <i class="bi bi-plus-lg"></i> {{ __('Surtir') }}
                        </button>
                    </td>

                    <td>
                        <a href="/ingrediente/{{ $ingrediente->id }}/edit" class="btn btn-success shadow-sm">{{ __('Editar') }}</a>
                    </td>

                    <td>
                        <a href="/ingrediente/{{ $ingrediente->id }}" class="btn btn-danger shadow-sm">{{ __('Eliminar') }}</a>
                    </td>
                </tr>

                <div class="modal fade" id="modalStock{{ $ingrediente->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title">{{ __('Surtir') }}: {{ $ingrediente->nombreingre }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('ingredientes.agregarStock', $ingrediente->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body p-4">
                                    <p class="mb-3">{{ __('Inventario actual') }}: 
                                        @if($ingrediente->inventario < 0)
                                            <span class="badge bg-danger px-3 py-2">
                                                <i class="bi bi-exclamation-triangle-fill"></i> {{ $ingrediente->inventario }} {{ $ingrediente->unidad_medida }} ({{ __('Negativo') }})
                                            </span>
                                        @else
                                            <strong class="text-primary fs-5">{{ $ingrediente->inventario }} {{ $ingrediente->unidad_medida }}</strong>
                                        @endif
                                    </p>
                                    
                                    @if($ingrediente->inventario < 0)
                                        <div class="alert alert-warning small py-2 d-flex align-items-center gap-2 border-0 shadow-sm">
                                            <i class="bi bi-info-circle-fill"></i> {{ __('Tu inventario es negativo. Te recomendamos surtir una cantidad mayor para normalizarlo o editar el ingrediente directamente.') }}
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="cantidad_nueva" class="form-label fw-bold">{{ __('Cantidad a sumar') }}:</label>
                                        <input type="number" step="0.01" name="cantidad_nueva" class="form-control form-control-lg text-center" placeholder="Ej: 5.00" required autofocus>
                                        <div class="form-text mt-2">{{ __('Esta cantidad se sumará directamente al total actual.') }}</div>
                                    </div>
                                </div>
                                <div class="modal-footer bg-light border-0">
                                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">{{ __('Cerrar') }}</button>
                                    <button type="submit" class="btn btn-primary px-4 shadow-sm">{{ __('Actualizar Inventario') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal de Ayuda -->
    <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="helpModalLabel"><i class="bi bi-info-circle-fill me-2"></i> {{ __('Guía de Uso: Ingredientes') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-box-seam text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Control de Stock') }}</h6>
                                    <p class="text-muted small">{{ __('Aquí puedes ver cuánto tienes de cada ingrediente. Si un número está en rojo o negativo, significa que te falta producto para completar pedidos.') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-truck text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Botón Surtir') }}</h6>
                                    <p class="text-muted small">{{ __('Usa el botón azul "Surtir" cuando llegue nueva mercancía. Solo escribe la cantidad que llegó y el sistema la sumará al total automáticamente.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-pencil-square text-warning fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Editar Datos') }}</h6>
                                    <p class="text-muted small">{{ __('Si el nombre o la unidad de medida (kg, lb, litros) están mal, usa el botón "Editar" para corregirlos.') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-exclamation-octagon text-danger fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Gestión de Crisis') }}</h6>
                                    <p class="text-muted small">{{ __('Si un ingrediente se agotó, el sistema bloqueará automáticamente la venta de platos que usen ese ingrediente hasta que surtas de nuevo.') }}</p>
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
