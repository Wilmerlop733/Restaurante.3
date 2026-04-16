(function () {
  var interval = null;
  var chartIngresos = null;
  var chartPlatos = null;

  function teardown() {
    if (interval) {
      clearInterval(interval);
      interval = null;
    }
    if (chartIngresos) {
      try {
        chartIngresos.destroy();
      } catch (e) { /* ignore */ }
      chartIngresos = null;
    }
    if (chartPlatos) {
      try {
        chartPlatos.destroy();
      } catch (e) { /* ignore */ }
      chartPlatos = null;
    }
    var a = document.querySelector('#chart-ingresos');
    var b = document.querySelector('#chart-platos');
    if (a) a.innerHTML = '';
    if (b) b.innerHTML = '';
  }

  function startDashboard() {
    var cfgEl = document.getElementById('dashboard-config');
    if (!cfgEl) return;

    var config;
    try {
      config = JSON.parse(cfgEl.textContent || '{}');
    } catch (e) {
      console.error('dashboard-config JSON inválido');
      return;
    }

    var apiUrl = config.apiUrl || '';
    var ingresosLabel = config.ingresosLabel || 'Ingresos';

    teardown();

    function initCharts() {
      if (typeof ApexCharts === 'undefined') {
        setTimeout(initCharts, 200);
        return;
      }

      var chartIngresosEl = document.querySelector('#chart-ingresos');
      var chartPlatosEl = document.querySelector('#chart-platos');
      if (!chartIngresosEl || !chartPlatosEl) return;

      var isDark = (localStorage.getItem('theme') || 'light') === 'dark';
      var baseTheme = { mode: isDark ? 'dark' : 'light' };

      var ingresosOptions = {
        chart: {
          type: 'area',
          height: 350,
          animations: { enabled: true, easing: 'linear', dynamicAnimation: { speed: 1000 } },
          toolbar: { show: false },
          background: 'transparent',
        },
        theme: baseTheme,
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 3 },
        colors: ['#10b981'],
        series: [{ name: ingresosLabel, data: [] }],
        xaxis: { categories: [] },
        yaxis: {
          min: 0,
          labels: { formatter: function (val) { return 'L. ' + val; } },
        },
        markers: {
          size: 5,
          colors: ['#10b981'],
          strokeWidth: 0,
          hover: { size: 7 },
        },
      };

      var platosOptions = {
        chart: { type: 'donut', height: 350, animations: { enabled: true }, background: 'transparent' },
        theme: baseTheme,
        series: [],
        labels: [],
        colors: ['#3b82f6', '#f59e0b', '#10b981', '#ef4444', '#8b5cf6'],
        dataLabels: {
          enabled: true,
          dropShadow: { enabled: false },
          style: { fontSize: '10px', fontWeight: 'bold' },
        },
        plotOptions: {
          pie: {
            dataLabels: { offset: 0 },
            donut: {
              size: '65%',
              labels: { show: true, name: { show: true }, value: { show: true } },
            },
          },
        },
      };

      chartIngresos = new ApexCharts(chartIngresosEl, ingresosOptions);
      chartPlatos = new ApexCharts(chartPlatosEl, platosOptions);
      chartIngresos.render();
      chartPlatos.render();

      fetchDashboardData();
      interval = setInterval(fetchDashboardData, 12000);
    }

    async function fetchDashboardData() {
      if (!chartIngresos || !chartPlatos || !apiUrl) return;
      try {
        var response = await fetch(apiUrl);
        if (!response.ok) throw new Error('API Error');
        var data = await response.json();

        var elIng = document.getElementById('kpi-ingresos');
        var elPed = document.getElementById('kpi-pedidos');
        var elPla = document.getElementById('kpi-platos');
        var elIngred = document.getElementById('kpi-ingredientes');
        if (elIng) {
          elIng.innerText = Number(data.kpis.ingresos || 0).toLocaleString('es-HN', { minimumFractionDigits: 2 });
        }
        if (elPed) elPed.innerText = data.kpis.pedidos || 0;
        if (elPla) elPla.innerText = data.kpis.platos || 0;
        if (elIngred) elIngred.innerText = data.kpis.ingredientes || 0;

        if (data.ingresosDiarios && data.ingresosDiarios.length > 0) {
          chartIngresos.updateOptions({
            series: [{ name: ingresosLabel, data: data.ingresosDiarios.map(function (item) { return parseFloat(item.ingresos); }) }],
            xaxis: { categories: data.ingresosDiarios.map(function (item) { return item.fecha; }) },
          });
        }

        if (data.platosMasVendidos && data.platosMasVendidos.length > 0) {
          chartPlatos.updateOptions({
            series: data.platosMasVendidos.map(function (item) { return parseInt(item.total_vendido, 10); }),
            labels: data.platosMasVendidos.map(function (item) { return item.nombreplato; }),
          });
        }
      } catch (err) {
        console.error('Dashboard Fetch Error:', err);
      }
    }

    initCharts();
  }

  // Since this script is loaded at the end of the body specifically for the dashboard,
  // we execute it immediately to avoid missing Turbo's turbo:load event.
  startDashboard();
  
  // Clean up before navigating away
  document.addEventListener('turbo:before-cache', teardown);
})();
