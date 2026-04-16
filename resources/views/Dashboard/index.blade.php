<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Dashboard Admin') }}</title>
    <script src="{{ asset('js/theme-head.js') }}"></script>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="/css/theme.css">
    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>

    <div class="dashboard-header d-flex justify-content-between align-items-center">
        <div>
            <h3 class="m-0 fw-bold"><i class="bi bi-bar-chart-fill text-warning"></i> {{ __('Dashboard Restaurante') }}</h3>
            <small class="text-muted">{{ __('Vista interactiva de inteligencia comercial') }}</small>
        </div>
        <div class="d-flex align-items-center gap-3">
            <span class="text-muted small"><span class="status-dot me-1"></span> {{ __('Actualizando en tiempo real') }}</span>
            <a href="{{ route('usuarios.index') }}" class="btn btn-primary btn-sm shadow-sm"><i class="bi bi-people-fill"></i> {{ __('Gestionar Usuarios') }}</a>
            <a href="/" class="btn btn-outline-secondary btn-sm shadow-sm">
                <i class="bi bi-arrow-left"></i> {{ __('Volver al Menú') }}
            </a>
        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card stat-card-green">
                    <h6 class="text-muted text-uppercase mb-2">{{ __('Ingresos Totales') }}</h6>
                    <h2 class="fw-bold mb-0 text-success">L. <span id="kpi-ingresos">--</span></h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card stat-card-blue">
                    <h6 class="text-muted text-uppercase mb-2">{{ __('Total Pedidos') }}</h6>
                    <h2 class="fw-bold mb-0 text-primary" id="kpi-pedidos">--</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card stat-card-yellow">
                    <h6 class="text-muted text-uppercase mb-2">{{ __('Total Platos') }}</h6>
                    <h2 class="fw-bold mb-0 text-warning" id="kpi-platos">--</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card stat-card-purple">
                    <h6 class="text-muted text-uppercase mb-2">{{ __('Ingredientes') }}</h6>
                    <h2 class="fw-bold mb-0 kpi-purple" id="kpi-ingredientes">--</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="chart-container">
                    <h5 class="fw-bold mb-4">{{ __('Ingresos por Día') }}</h5>
                    <div id="chart-ingresos"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="chart-container">
                    <h5 class="fw-bold mb-4">{{ __('Platos Más Vendidos') }}</h5>
                    <div id="chart-platos"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="application/json" id="dashboard-config">@json([
        'ingresosLabel' => __('Ingresos'),
        'apiUrl' => url('/api/dashboard-data'),
    ])</script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

