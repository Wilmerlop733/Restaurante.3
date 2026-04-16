<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Realizar Pedido') }}</title>
    <script src="{{ asset('js/theme-head.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/@hotwired/turbo@7.1.0/dist/turbo.es2017-umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-body-tertiary">

<div class="container page-container">
    @include('Partes.navbar')
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
                <img src="/Comidas/{{ $plato->foto }}" class="card-img-top cliente-card-img" alt="{{ $plato->nombreplato }}">
                
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

    @include('Guias.pedidos')
</body>
</html>
