<x-app-layout>
  @section('breadcrumbs')
    <li class="text-sm">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="{{ route('clientes.index') }}">
        <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        {{ __('Clientes') }}
      </a>
    </li>
    <li class="text-sm">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
        <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        {{ __('Editar') }}
      </a>
    </li>
  @endsection

  <x-toast :show="session('status') != '' ? true : false" :type="session('status')" :message="session('message')" />

  <div class="max-w-[100rem] px-4 py-2 sm:px-6 lg:px-8 lg:py-2 mx-auto">
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
      <div class="mb-8">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
          {{ __('Editar Cliente') }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          {{ __('Formulario para editar un cliente.') }}
        </p>
      </div>

      <form method="post" action="{{ route('clientes.update', $cliente->idcliente) }}">
        @csrf
        @method('PUT')

        <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
          <!-- Nombre -->
          <div class="sm:col-span-3">
            <label for="nombre" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
              {{ __('Nombre') }}
            </label>
          </div>
          <div class="sm:col-span-9">
            <input
              id="nombre"
              name="nombre"
              type="text"
              maxlength="100"
              class="py-2 px-3 pe-11 block w-full border-gray-200 rounded-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
              placeholder="{{ __('Nombre del cliente') }}"
              value="{{ old('nombre', $cliente->nombre) }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
          </div>

          <!-- Apellido -->
          <div class="sm:col-span-3">
            <label for="apellido" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
              {{ __('Apellido') }}
            </label>
          </div>
          <div class="sm:col-span-9">
            <input
              id="apellido"
              name="apellido"
              type="text"
              maxlength="100"
              class="py-2 px-3 pe-11 block w-full border-gray-200 rounded-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
              placeholder="{{ __('Apellido del cliente') }}"
              value="{{ old('apellido', $cliente->apellido) }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('apellido')" />
          </div>

          <!-- Teléfono -->
          <div class="sm:col-span-3">
            <label for="telefono" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
              {{ __('Teléfono') }}
            </label>
          </div>
          <div class="sm:col-span-9">
            <input
              id="telefono"
              name="telefono"
              type="text"
              maxlength="20"
              class="py-2 px-3 pe-11 block w-full border-gray-200 rounded-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
              placeholder="{{ __('Ej. 5555-5555') }}"
              value="{{ old('telefono', $cliente->telefono) }}"
            >
            <x-input-error class="mt-2" :messages="$errors->get('telefono')" />
          </div>

          <!-- Dirección -->
          <div class="sm:col-span-3">
            <label for="direccion" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
              {{ __('Dirección') }}
            </label>
          </div>
          <div class="sm:col-span-9">
            <textarea
              id="direccion"
              name="direccion"
              rows="3"
              maxlength="255"
              class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
              placeholder="{{ __('Dirección del cliente (opcional)') }}"
            >{{ old('direccion', $cliente->direccion) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('direccion')" />
          </div>
        </div>

        <div class="mt-5 flex justify-end gap-x-2">
          <a href="{{ route('clientes.index') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            {{ __('Cancelar') }}
          </a>
          <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            {{ __('Guardar') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
