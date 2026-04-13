<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Realizar Pedido') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('js/theme-head.js') }}"></script>
    <script src="https://unpkg.com/@hotwired/turbo@7.1.0/dist/turbo.es2017-umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-body-tertiary">

<div class="container" style="margin-top: 1.25rem !important;">
    @include('partials.navbar')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <h1 class="mb-0 mx-auto">{{ __('Realizar Pedido') }}</h1>
            <button type="button" class="btn btn-link text-primary fs-3 p-0 ms-2 shadow-none" data-bs-toggle="modal" data-bs-target="#helpModal">
                <i class="bi bi-question-circle-fill"></i>
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @foreach($dPlatos as $plato)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="/Comidas/{{ $plato->foto }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $plato->nombreplato }}">
                
                <div class="card-body text-center">
                    <h5 class="card-title text-warning">{{ $plato->nombreplato }}</h5>
                    <p class="card-text small text-muted">{{ $plato->descripcionplato }}</p>
                    <h4 class="mb-3">L. {{ number_format($plato->precio, 2) }}</h4>

                    <form action="{{ route('plato.ordenar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idplato" value="{{ $plato->id }}">
                        
                        <div class="mb-3">
                            <label for="cantidad_{{ $plato->id }}" class="form-label small fw-bold">{{ __('Cantidad') }}</label>
                            <input type="number" name="cantidad" id="cantidad_{{ $plato->id }}" 
                                   class="form-control form-control-sm text-center" 
                                   value="1" min="1" max="100" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-outline-info fw-bold">
                                <i class="bi bi-cart-plus"></i> {{ __('SOLICITAR PEDIDO') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

    <!-- Modal de Ayuda -->
    <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="helpModalLabel"><i class="bi bi-info-circle-fill me-2"></i> {{ __('Guía de Uso: Toma de Pedidos') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-info-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-cart-check text-info fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Selección de Platos') }}</h6>
                                    <p class="text-muted small">{{ __('Busca el plato que el cliente desea. Verás la foto, descripción y el precio unitario para informar al cliente.') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-plus-slash-minus text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Ajustar Cantidad') }}</h6>
                                    <p class="text-muted small">{{ __('Usa el recuadro de cantidad para indicar cuántas porciones quiere el cliente. El sistema calculará el total automáticamente.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-lightning-charge text-warning fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Envío del Pedido') }}</h6>
                                    <p class="text-muted small">{{ __('Al pulsar "SOLICITAR PEDIDO", el sistema verifica si hay stock suficiente en cocina y registra la venta de inmediato.') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 54px; height: 54px; flex-shrink: 0;">
                                    <i class="bi bi-exclamation-triangle text-danger fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('Errores de Stock') }}</h6>
                                    <p class="text-muted small">{{ __('Si te aparece un mensaje en rojo, es que no hay suficientes ingredientes. Avisa al cliente que ese plato no está disponible temporalmente.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-info text-white px-4" data-bs-dismiss="modal">{{ __('Entendido') }}</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
