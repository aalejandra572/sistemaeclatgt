<x-app-layout>
    @section('breadcrumbs')
    <li class="text-sm">
        <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
            <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            {{ __('Marcas') }}
        </a>
    </li>
    @endsection>

    <x-toast :show="session('status') != '' ? true : false" :type="session('status')" :message="session('message')"/>

    <div class="max-w-[100rem] px-4 py-2 sm:px-6 lg:px-8 lg:py-2 mx-auto">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                        <!-- Header -->
                        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                            <!-- Input -->
                            <div class="sm:col-span-1">
                                <label for="hs-marca-search" class="sr-only">Buscar</label>
                                <div class="relative">
                                    <input
                                        type="text"
                                        id="hs-marca-search"
                                        value="{{ $search ?? '' }}"
                                        onkeyup="searchMarca(event)"
                                        class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                        placeholder="{{ __('Buscar marca...') }}"
                                    >
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- End Input -->

                            @if (Auth::user()->hasPermission('new-marca'))
                            <a href="{{ route('marcas.new') }}" class="py-3 px-4 flex justify-center items-center h-[2.875rem] w-[2.875rem] text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-circle flex-shrink-0 w-5 h-5"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                            </a>
                            @endif
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-slate-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('Marca') }}
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            {{ __('Descripción') }}
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($marcas as $m)
                                <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800">
                                    <td class="h-px w-px whitespace-nowrap align-center">
                                        <div class="block py-2 px-6">
                                            <div class="flex items-center gap-x-3">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $m->nombre }}</span>
                                                    <span class="block text-xs text-gray-500">#{{ $m->idmarca }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="h-px w-px whitespace-nowrap align-center">
                                        <div class="block py-2 px-6">
                                            <span class="text-sm text-gray-700 dark:text-gray-300">
                                                {{ \Illuminate\Support\Str::limit($m->descripcion, 90) }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="h-px w-px whitespace-nowrap align-center text-center">
                                        <div class="block py-2 px-6" x-data="{ open: false }" @click.away="open = false">
                                            <button @click="open = !open"
                                                class="py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-sm text-gray-700 align-middle focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 transition-all text-sm dark:text-gray-400 dark:hover:text-white">
                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                                </svg>
                                            </button>

                                            <div x-show="open" x-transition
                                                class="absolute mt-2 min-w-[10rem] z-10 bg-white shadow-lg rounded-lg p-2 dark:bg-gray-800 border border-gray-200 dark:border-gray-700">

                                                @if (Auth::user()->hasPermission('edit-marca'))
                                                    <a href="{{ route('marcas.edit', $m->idmarca) }}"
                                                       class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                        </svg>
                                                        {{ __('Editar') }}
                                                    </a>
                                                @endif

                                                @if (Auth::user()->hasPermission('delete-marca'))
                                                    <form method="POST" action="{{ route('marcas.destroy', $m->idmarca) }}" class="delete-marca-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="delete-btn w-full flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-red-600 hover:bg-gray-100 dark:text-red-500 dark:hover:bg-gray-700"
                                                            data-id="{{ $m->idmarca }}"
                                                            data-nombre="{{ $m->nombre }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h8" />
                                                            </svg>
                                                            {{ __('Eliminar') }}
                                                        </button>
                                                    </form>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800">
                                    <td colspan="3">
                                        <div class="max-w-sm w-full min-h-[300px] flex flex-col justify-center text-center items-center mx-auto px-6 py-4">
                                            <div class="flex justify-center items-center w-[46px] h-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag flex-shrink-0 w-6 h-6 text-gray-600 dark:text-gray-400">
                                                    <path d="M2 10v3a2 2 0 0 0 .586 1.414l7 7A2 2 0 0 0 11 22h3a2 2 0 0 0 1.414-.586l7-7A2 2 0 0 0 23 13v-3a2 2 0 0 0-.586-1.414l-7-7A2 2 0 0 0 14 1h-3a2 2 0 0 0-1.414.586l-7 7A2 2 0 0 0 2 10z"/>
                                                    <circle cx="7.5" cy="7.5" r="1.5"/>
                                                </svg>
                                            </div>

                                            <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
                                                {{ __('No se encontraron marcas') }}
                                            </h2>
                                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('¿Deseas crear una marca?') }}
                                            </p>
                                            @if (Auth::user()->hasPermission('new-marca'))
                                            <div class="mt-5 grid sm:flex gap-2">
                                                <a href="{{ route('marcas.new') }}" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"/>
                                                        <path d="M12 5v14"/>
                                                    </svg>
                                                    {{ __('Crear Marca') }}
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table -->

                        <!-- Footer -->
                        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                            {{ $marcas->links() }}
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                let form = this.closest('form');
                let nombre = this.getAttribute('data-nombre');

                Swal.fire({
                    title: '¿Eliminar marca?',
                    text: `Se eliminará la marca "${nombre}" de forma permanente.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
    </script>

    <script>
    function searchMarca(e) {
        if (e.key === 'Enter') {
            const q = document.getElementById('hs-marca-search').value.trim();
            const base = "{{ route('marcas.index') }}";
            const url = q ? `${base}?search=${encodeURIComponent(q)}` : base;
            window.location.href = url;
        }
    }
    </script>
    @endpush
</x-app-layout>
