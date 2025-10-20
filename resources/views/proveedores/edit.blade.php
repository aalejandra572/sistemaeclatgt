<x-app-layout>
  @section('breadcrumbs')
    <li class="text-sm">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="{{ route('proveedores.index') }}">
        <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        {{ __('Proveedores') }}
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

  <!-- Card Section -->
  <div class="max-w-[100rem] px-4 py-2 sm:px-6 lg:px-8 lg:py-2 mx-auto">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
      <div class="mb-8">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
          {{ __('Editar Proveedor') }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          {{ __('Actualiza la información del proveedor') }}.
        </p>
      </div>

      <form method="POST" action="{{ route('proveedores.update', $proveedor->idproveedor) }}">
        @csrf
        @method('PUT')

        <!-- Grid -->
        <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

          <!-- Nombre -->
          <div class="sm:col-span-3">
            <label for="prov-nombre" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
              {{ __('Nombre del proveedor') }} <span class="text-red-600">*</span>
            </label>
          </div>
          <div class="sm:col-span-9">
            <input id="prov-nombre" name="nombre" type="text" maxlength="150" autocomplete="off"
              class="py-2 px-3 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-300 dark:focus:ring-gray-600"
              value="{{ old('nombre', $proveedor->nombre) }}">
            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
          </div>
          <!-- End Nombre -->

          <!-- Contacto -->
          <div class="sm:col-span-3">
            <label for="prov-contacto" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
              {{ __('Persona de contacto') }}
            </label>
          </div>
          <div class="sm:col-span-9">
            <input id="prov-contacto" name="contacto" type="text" maxlength="150" autocomplete="off"
              class="py-2 px-3 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-300 dark:focus:ring-gray-600"
              value="{{ old('contacto', $proveedor->contacto) }}">
            <x-input-error class="mt-2" :messages="$errors->get('contacto')" />
          </div>
          <!-- End Contacto -->

          <!-- Teléfono -->
          <div class="sm:col-span-3">
            <label for="prov-telefono" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
              {{ __('Teléfono') }}
            </label>
          </div>
          <div class="sm:col-span-9">
            <input id="prov-telefono" name="telefono" type="tel" maxlength="30" autocomplete="off"
              class="py-2 px-3 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-300 dark:focus:ring-gray-600"
              value="{{ old('telefono', $proveedor->telefono) }}">
            <x-input-error class="mt-2" :messages="$errors->get('telefono')" />
          </div>
          <!-- End Teléfono -->

          <!-- Correo -->
          <div class="sm:col-span-3">
            <label for="prov-correo" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
              {{ __('Correo electrónico') }}
            </label>
          </div>
          <div class="sm:col-span-9">
            <input id="prov-correo" name="correo" type="email" maxlength="150" autocomplete="off"
              class="py-2 px-3 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-300 dark:focus:ring-gray-600"
              value="{{ old('correo', $proveedor->correo) }}">
            <x-input-error class="mt-2" :messages="$errors->get('correo')" />
          </div>
          <!-- End Correo -->

          <!-- Dirección -->
          <div class="sm:col-span-3">
            <label for="prov-direccion" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
              {{ __('Dirección') }}
            </label>
          </div>
          <div class="sm:col-span-9">
            <textarea id="prov-direccion" name="direccion" rows="3" maxlength="255"
              class="py-2 px-3 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-300 dark:focus:ring-gray-600">{{ old('direccion', $proveedor->direccion) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('direccion')" />
          </div>
          <!-- End Dirección -->

        </div>
        <!-- End Grid -->

        <div class="mt-5 flex justify-end gap-x-2">
          <a href="{{ route('proveedores.index') }}"
             class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            {{ __('Cancelar') }}
          </a>
          <button type="submit"
             class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            {{ __('Guardar') }}
          </button>
        </div>
      </form>
    </div>
    <!-- End Card -->
  </div>
</x-app-layout>
