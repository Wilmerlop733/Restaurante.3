<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Dashboard Admin') }}</title>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="/css/theme.css">
    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.setAttribute('data-bs-theme', 'dark');
        }
    </script>

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
            <a href="/" class="btn btn-outline-secondary btn-sm shadow-sm">{{ __('Volver al Menú') }}</a>
        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card" style="border-top-color: #10b981;">
                    <h6 class="text-muted text-uppercase mb-2">{{ __('Ingresos Totales') }}</h6>
                    <h2 class="fw-bold mb-0 text-success">L. <span id="kpi-ingresos">--</span></h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card" style="border-top-color: #3b82f6;">
                    <h6 class="text-muted text-uppercase mb-2">{{ __('Total Pedidos') }}</h6>
                    <h2 class="fw-bold mb-0 text-primary" id="kpi-pedidos">--</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card" style="border-top-color: #f59e0b;">
                    <h6 class="text-muted text-uppercase mb-2">{{ __('Total Platos') }}</h6>
                    <h2 class="fw-bold mb-0 text-warning" id="kpi-platos">--</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card" style="border-top-color: #8b5cf6;">
                    <h6 class="text-muted text-uppercase mb-2">{{ __('Ingredientes') }}</h6>
                    <h2 class="fw-bold mb-0" style="color: #8b5cf6;" id="kpi-ingredientes">--</h2>
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

    <script>
        document.addEventListener('turbo:load', function() {
            let chartIngresos = null;
            let chartPlatos = null;
            let interval = null;

            function initCharts() {
                if (typeof ApexCharts === 'undefined') {
                    console.log("Esperando a ApexCharts...");
                    setTimeout(initCharts, 200);
                    return;
                }

                const chartIngresosEl = document.querySelector("#chart-ingresos");
                const chartPlatosEl = document.querySelector("#chart-platos");
                
                if (!chartIngresosEl || !chartPlatosEl) return;

                chartIngresosEl.innerHTML = '';
                chartPlatosEl.innerHTML = '';

                const isDark = (localStorage.getItem('theme') || 'light') === 'dark';
                const baseTheme = { mode: isDark ? 'dark' : 'light' };

                const ingresosOptions = {
                    chart: {
                        type: 'area',
                        height: 350,
                        animations: { enabled: true, easing: 'linear', dynamicAnimation: { speed: 1000 } },
                        toolbar: { show: false },
                        background: 'transparent'
                    },
                    theme: baseTheme,
                    dataLabels: { enabled: false },
                    stroke: { curve: 'smooth', width: 3 },
                    colors: ['#10b981'],
                    series: [{ name: '{{ __("Ingresos") }}', data: [] }],
                    xaxis: { categories: [] },
                    yaxis: { 
                        min: 0,
                        labels: { formatter: (val) => "L. " + val } 
                    },
                    markers: {
                        size: 5,
                        colors: ['#10b981'],
                        strokeWidth: 0,
                        hover: { size: 7 }
                    }
                };

                const platosOptions = {
                    chart: { type: 'donut', height: 350, animations: { enabled: true }, background: 'transparent' },
                    theme: baseTheme,
                    series: [],
                    labels: [],
                    colors: ['#3b82f6', '#f59e0b', '#10b981', '#ef4444', '#8b5cf6'],
                    dataLabels: {
                        enabled: true,
                        dropShadow: { enabled: false },
                        style: { fontSize: '10px', fontWeight: 'bold' }
                    },
                    plotOptions: { 
                        pie: { 
                            dataLabels: {
                                offset: 0
                            },
                            donut: { 
                                size: '65%', 
                                labels: { 
                                    show: true, 
                                    name: { show: true }, 
                                    value: { show: true } 
                                } 
                            } 
                        } 
                    }
                };

                chartIngresos = new ApexCharts(chartIngresosEl, ingresosOptions);
                chartPlatos = new ApexCharts(chartPlatosEl, platosOptions);
                
                chartIngresos.render();
                chartPlatos.render();

                fetchDashboardData();
                
                if (interval) clearInterval(interval);
                interval = setInterval(fetchDashboardData, 12000);
            }

            async function fetchDashboardData() {
                if (!chartIngresos || !chartPlatos) return;
                try {
                    const response = await fetch(window.location.origin + '/api/dashboard-data');
                    if (!response.ok) throw new Error('API Error');
                    const data = await response.json();

                    document.getElementById('kpi-ingresos').innerText = Number(data.kpis.ingresos || 0).toLocaleString('es-HN', { minimumFractionDigits: 2 });
                    document.getElementById('kpi-pedidos').innerText = data.kpis.pedidos || 0;
                    document.getElementById('kpi-platos').innerText = data.kpis.platos || 0;
                    document.getElementById('kpi-ingredientes').innerText = data.kpis.ingredientes || 0;

                    if(data.ingresosDiarios && data.ingresosDiarios.length > 0) {
                        chartIngresos.updateOptions({
                            series: [{ name: '{{ __("Ingresos") }}', data: data.ingresosDiarios.map(item => parseFloat(item.ingresos)) }],
                            xaxis: { categories: data.ingresosDiarios.map(item => item.fecha) }
                        });
                    }

                    if(data.platosMasVendidos && data.platosMasVendidos.length > 0) {
                        chartPlatos.updateOptions({
                            series: data.platosMasVendidos.map(item => parseInt(item.total_vendido)),
                            labels: data.platosMasVendidos.map(item => item.nombreplato)
                        });
                    }
                } catch (error) { console.error("Dashboard Fetch Error:", error); }
            }

            initCharts();

            document.addEventListener('turbo:before-cache', () => {
                if (interval) clearInterval(interval);
            }, { once: true });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

