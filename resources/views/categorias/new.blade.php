<x-app-layout>
  @section('breadcrumbs')
    <li class="text-sm">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="{{ route('categorias.index') }}">
        <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        {{ __('Categorías') }}
      </a>
    </li>
    <li class="text-sm">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
        <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        {{ __('Nuevo') }}
      </a>
    </li>
  @endsection

  <div class="max-w-[100rem] px-4 py-2 sm:px-6 lg:px-8 lg:py-2 mx-auto">
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
      <div class="mb-8">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
          {{ __('Crear Categoría') }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          {{ __('Formulario para registrar categorías.') }}
        </p>
      </div>

      <form method="POST" action="{{ route('categorias.store') }}">
        @csrf

        <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
          <!-- Nombre -->
          <div class="sm:col-span-3">
            <label for="categoria-nombre" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
              {{ __('Nombre de la categoría') }} <span class="text-red-600">*</span>
            </label>
          </div>
          <div class="sm:col-span-9">
            <input id="categoria-nombre" name="nombre" type="text" maxlength="150" autocomplete="off"
              class="py-2 px-3 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-300 dark:focus:ring-gray-600"
              placeholder="Ej. Cuidado de la piel, Maquillaje..."
              value="{{ old('nombre') }}" autofocus>
            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
          </div>
          <!-- End Nombre -->

          <!-- Descripción -->
          <div class="sm:col-span-3">
            <label for="categoria-descripcion" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
              {{ __('Descripción') }}
            </label>
          </div>
          <div class="sm:col-span-9">
            <textarea id="categoria-descripcion" name="descripcion" rows="3" maxlength="1000"
              class="py-2 px-3 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-300 dark:focus:ring-gray-600"
              placeholder="Descripción de la categoría (opcional)">{{ old('descripcion') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('descripcion')" />
          </div>
          <!-- End Descripción -->
        </div>

        <div class="mt-5 flex justify-end gap-x-2">
          <a href="{{ route('categorias.index') }}"
             class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            {{ __('Cancelar') }}
          </a>
          <button type="submit"
             class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            {{ __('Crear') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
