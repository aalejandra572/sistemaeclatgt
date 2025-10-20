<x-app-layout>
  @section('breadcrumbs')
    <li class="text-sm">
      <span class="flex items-center text-sm text-gray-500 dark:text-gray-300">
      </span>
    </li>
  @endsection

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Tarjetas de totales (en rojo) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
      <div class="rounded-2xl border border-red-100 bg-white p-6 shadow-sm dark:bg-slate-800 dark:border-red-900/30">
        <div class="flex items-center justify-between">
          <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-300">Total Compras</h3>
          <span class="text-xs px-2 py-1 rounded-full bg-red-50 text-red-600 border border-red-100 dark:bg-red-900/20 dark:text-red-300 dark:border-red-900/30">Q</span>
        </div>
        <p class="mt-2 text-3xl font-bold text-red-600 dark:text-red-400">
          {{ number_format($totalCompras, 2) }}
        </p>
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Suma total de las compras</p>
      </div>

      <div class="rounded-2xl border border-red-100 bg-white p-6 shadow-sm dark:bg-slate-800 dark:border-red-900/30">
        <div class="flex items-center justify-between">
          <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-300">Total Ventas</h3>
          <span class="text-xs px-2 py-1 rounded-full bg-red-50 text-red-600 border border-red-100 dark:bg-red-900/20 dark:text-red-300 dark:border-red-900/30">Q</span>
        </div>
        <p class="mt-2 text-3xl font-bold text-red-600 dark:text-red-400">
          {{ number_format($totalVentas, 2) }}
        </p>
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Suma total de las ventas</p>
      </div>
    </div>

    <!-- Conteos por tabla -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
      <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-gray-100 dark:bg-slate-800 dark:ring-slate-700">
        <p class="text-xs text-gray-500 dark:text-gray-400">Clientes</p>
        <p class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">{{ $countClientes }}</p>
      </div>
      <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-gray-100 dark:bg-slate-800 dark:ring-slate-700">
        <p class="text-xs text-gray-500 dark:text-gray-400">Marcas</p>
        <p class="mt-1 text-2xl font-semibold">{{ $countMarcas }}</p>
      </div>
      <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-gray-100 dark:bg-slate-800 dark:ring-slate-700">
        <p class="text-xs text-gray-500 dark:text-gray-400">Productos</p>
        <p class="mt-1 text-2xl font-semibold">{{ $countProductos }}</p>
      </div>
      <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-gray-100 dark:bg-slate-800 dark:ring-slate-700">
        <p class="text-xs text-gray-500 dark:text-gray-400">Usuarios</p>
        <p class="mt-1 text-2xl font-semibold">{{ $countUsuarios }}</p>
      </div>
      <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-gray-100 dark:bg-slate-800 dark:ring-slate-700">
        <p class="text-xs text-gray-500 dark:text-gray-400">Proveedores</p>
        <p class="mt-1 text-2xl font-semibold">{{ $countProveedores }}</p>
      </div>
      <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-gray-100 dark:bg-slate-800 dark:ring-slate-700">
        <p class="text-xs text-gray-500 dark:text-gray-400">Categorías</p>
        <p class="mt-1 text-2xl font-semibold">{{ $countCategorias }}</p>
      </div>
    </div>

    <!-- Gráfica -->
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-100 dark:bg-slate-800 dark:ring-slate-700">
      <div class="flex items-center justify-between mb-4">
        <h3 class="text-base font-semibold text-gray-800 dark:text-gray-100">Registros por módulo</h3>
      </div>
      <canvas id="countsChart" class="w-full h-64"></canvas>
    </div>

  </div>

  @push('scripts')
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
      const ctx = document.getElementById('countsChart');

      // Datos desde PHP
      const labels = ['Clientes','Marcas','Productos','Usuarios','Proveedores','Categorías'];
      const values = [
        {{ $countClientes }},
        {{ $countMarcas }},
        {{ $countProductos }},
        {{ $countUsuarios }},
        {{ $countProveedores }},
        {{ $countCategorias }},
      ];

      // Colores de tu paleta
      const mainGreen = '#008000';
      const deepGreen = '#465C47';
      const gray = '#808080';
      const black = '#000000';
      const white = '#FFFFFF';

      new Chart(ctx, {
        type: 'bar',
        data: {
          labels,
          datasets: [{
            label: 'Cantidad',
            data: values,
            backgroundColor: [mainGreen, deepGreen, gray, black, mainGreen, deepGreen],
            borderColor: [deepGreen, black, black, black, deepGreen, black],
            borderWidth: 1,
            borderRadius: 8,
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { display: false },
            tooltip: { enabled: true }
          },
          scales: {
            y: {
              beginAtZero: true,
              grid: { color: 'rgba(0,0,0,0.05)' },
              ticks: { precision: 0 }
            },
            x: {
              grid: { display: false }
            }
          }
        }
      });
    </script>
  @endpush
</x-app-layout>
