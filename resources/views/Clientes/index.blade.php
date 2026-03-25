<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.setAttribute('data-bs-theme', 'dark');
        }
    </script>
</head>
<body class="bg-body-tertiary">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="/" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Volver al Menú</a>
        <h1 class="text-center">Realizar Pedido</h1>
        <div></div>
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
                        <div class="d-grid">
                            <button type="submit" class="btn btn-outline-info fw-bold">
                                <i class="bi bi-cart-plus"></i> SOLICITAR PLATO
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>