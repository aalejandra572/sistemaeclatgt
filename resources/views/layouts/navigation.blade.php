<header class="sticky top-0 inset-x-0 z-50 bg-white border-b dark:bg-gray-800 dark:border-gray-700 shadow">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex items-center">
        <!-- Botón hamburguesa SIEMPRE visible (ya no depende de lg:hidden) -->
        <button id="sidebarToggle" class="text-gray-700 dark:text-gray-200 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>

        <!-- Logo -->
        <a href="#" class="ml-4 text-xl font-bold text-gray-800 dark:text-white">
          <x-application-logo class="h-8 w-auto fill-current" />
        </a>
      </div>

      <!-- Menú de usuario -->
      <div class="flex items-center gap-4">
        <div class="relative">
          <button id="userMenuButton" class="flex items-center focus:outline-none">
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-white font-bold">
              {{ Str::of(auth()->user()->name)->charAt(0) }}
            </span>
          </button>

          <div id="userMenu" class="hidden absolute right-0 mt-2 w-56 bg-white dark:bg-gray-700 rounded-md shadow-lg py-2 z-50">
            <div class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">
              {{ __('Signed in as') }}<br>
              <span class="font-medium">{{ auth()->user()->email }}</span>
            </div>

            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">{{ __('Profile') }}</a>

            <div class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 dark:text-gray-200">
              <span>{{ __('Dark Mode') }}</span>
              <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" id="themeSwitch" class="sr-only">
                <div class="w-10 h-5 bg-gray-200 dark:bg-gray-600 rounded-full peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-500 dark:peer-focus:ring-blue-300 peer peer-checked:bg-blue-600 transition-all"></div>
                <div class="absolute left-1 top-1 w-3.5 h-3.5 bg-white rounded-full transition-all peer-checked:translate-x-5"></div>
              </label>
            </div>

            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                {{ __('Log Out') }}
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Overlay (ahora también en desktop) -->
<div id="backdrop" class="hidden fixed inset-0 top-16 z-30 bg-black/40"></div>

<!-- Sidebar – off-canvas en todos los tamaños -->
<aside id="sidebar"
  class="fixed top-16 left-0 z-40 w-64 h-[calc(100vh-4rem)]
         bg-white/90 dark:bg-gray-800/80 border border-gray-200 dark:border-gray-700
         backdrop-blur-md overflow-y-auto
         transform -translate-x-full transition-transform duration-300 ease-in-out
         lg:left-4 lg:top-20 lg:h-[calc(100vh-6.5rem)] lg:rounded-2xl lg:shadow-lg">
  <nav class="p-3 space-y-1">
    <a href="{{ route('dashboard') }}"
       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
              {{ request()->routeIs('dashboard') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/></svg>
      {{ __('Dashboard') }}
    </a>
    <a href="{{ route('users.index') }}"
       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
              {{ request()->routeIs('users.*') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z"/></svg>
      {{ __('Users') }}
    </a>
    <a href="{{ route('roles.index') }}"
       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
              {{ request()->routeIs('roles.*') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6v4h4V6zM18 6h-4v4h4V6zM10 14H6v4h4v-4zM18 14h-4v4h4v-4z"/></svg>
      {{ __('Roles') }}
    </a>
    <a href="{{ route('permissions.index') }}"
       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
              {{ request()->routeIs('permissions.*') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7 7h10M7 17h10"/></svg>
      {{ __('Permissions') }}
    </a>
    <a href="{{ route('permissions.index') }}"
   class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
          {{ request()->routeIs('empleados.*') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
    <!-- Icono: Usuario múltiple -->
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87m8-5.13a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>
    {{ __('Empleados') }}
  </a>

  <a href="{{ route('clientes.index') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
            {{ request()->routeIs('clientes.*') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
    <!-- Icono: Usuario -->
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5.121 17.804A4 4 0 017 17h10a4 4 0 011.879.804M15 11a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>
    {{ __('Clientes') }}
  </a>

  <a href="{{ route('proveedores.index') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
            {{ request()->routeIs('proveedores.*') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
    <!-- Icono: Camión (entregas) -->
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 7h13v10H3V7zm13 0l5 5v5h-5V7zM7 20a2 2 0 11-4 0 2 2 0 014 0zm14 0a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    {{ __('Proveedores') }}
  </a>

  <a href="{{ route('marcas.index') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
            {{ request()->routeIs('marcas.*') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
    <!-- Icono: Etiqueta -->
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M7 7h.01M3 3h6l7 7-6 6-7-7V3z" />
    </svg>
    {{ __('Marcas') }}
  </a>

  <a href="{{ route('permissions.index') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
            {{ request()->routeIs('productos.*') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
    <!-- Icono: Caja -->
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M20 13V7a2 2 0 00-1-1.73l-7-4-7 4A2 2 0 004 7v6a2 2 0 001 1.73l7 4 7-4a2 2 0 001-1.73z" />
    </svg>
    {{ __('Productos') }}
  </a>

  <a href="{{ route('categorias.index') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
            {{ request()->routeIs('categorias.*') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
    <!-- Icono: Cuadrícula -->
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 3h7v7H3V3zm0 11h7v7H3v-7zm11-11h7v7h-7V3zm0 11h7v7h-7v-7z" />
    </svg>
    {{ __('Categorias') }}
  </a>

  <a href="{{ route('permissions.index') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
            {{ request()->routeIs('ventas.*') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
    <!-- Icono: Carrito -->
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.6 8M17 13l1.6 8M9 21a2 2 0 104 0 2 2 0 00-4 0z" />
    </svg>
    {{ __('Ventas') }}
  </a>
  <a href="{{ route('permissions.index') }}"
    class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700
            {{ request()->routeIs('compras.*') ? 'bg-gray-100 dark:bg-gray-700 font-medium' : '' }}">
    <!-- Icono: Bolsa de compras -->
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M16 11V5a4 4 0 00-8 0v6M5 9h14l1 12H4L5 9z" />
    </svg>
    {{ __('Compras') }}
  </a>

  </nav>
</aside>




<script>
  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('sidebar');
  const backdrop = document.getElementById('backdrop');
  const userMenuBtn = document.getElementById('userMenuButton');
  const userMenu = document.getElementById('userMenu');
  const themeSwitch = document.getElementById('themeSwitch');

  // Helpers
  const isOpen = () => !sidebar.classList.contains('-translate-x-full');
  const openSidebar = () => {
    sidebar.classList.remove('-translate-x-full');
    sidebar.setAttribute('aria-hidden','false');
    backdrop.classList.remove('hidden');
  };
  const closeSidebar = () => {
    sidebar.classList.add('-translate-x-full');
    sidebar.setAttribute('aria-hidden','true');
    backdrop.classList.add('hidden');
  };

  // Toggle
  sidebarToggle.addEventListener('click', (e) => {
    e.stopPropagation();
    isOpen() ? closeSidebar() : openSidebar();
  });

  // Cerrar por click fuera (móvil y desktop)
  document.addEventListener('click', (e) => {
    if (isOpen() && !sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
      closeSidebar();
    }
  });

  // Cerrar con overlay y Escape
  backdrop.addEventListener('click', closeSidebar);
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && isOpen()) closeSidebar(); });

  // Cerrar al hacer click en un link del sidebar
  sidebar.addEventListener('click', (e) => {
    const a = e.target.closest('a');
    if (a) closeSidebar();
  });

  // Menú de usuario (igual)
  userMenuBtn.addEventListener('click', (e) => { e.stopPropagation(); userMenu.classList.toggle('hidden'); });
  document.addEventListener('click', (e) => {
    if (!userMenu.contains(e.target) && !userMenuBtn.contains(e.target)) userMenu.classList.add('hidden');
  });
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape') userMenu.classList.add('hidden'); });

  // Tema (igual)
  function applyTheme() {
    const theme = localStorage.getItem('theme');
    document.documentElement.classList.toggle('dark', theme === 'dark');
    if (themeSwitch) themeSwitch.checked = theme === 'dark';
  }
  if (themeSwitch) {
    themeSwitch.addEventListener('change', () => {
      const theme = themeSwitch.checked ? 'dark' : 'light';
      document.documentElement.classList.toggle('dark', theme === 'dark');
      localStorage.setItem('theme', theme);
    });
  }
  document.addEventListener('DOMContentLoaded', applyTheme);
</script>



