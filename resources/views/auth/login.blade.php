<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-[#465C47] via-[#008000] to-[#000000] flex items-center justify-center p-6">

  <div class="w-full max-w-md">
    <!-- Tarjeta -->
    <div class="bg-white/95 backdrop-blur rounded-2xl shadow-xl ring-1 ring-black/5 overflow-hidden">
      <!-- Encabezado con logo -->
      <div class="px-8 pt-8 pb-4 text-center">
        <div class="mx-auto h-28 w-28 rounded-2xl bg-[#008000]/10 flex items-center justify-center ring-1 ring-[#008000]/20">
            <!-- Reemplaza la ruta del logo por la tuya -->
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-full w-full object-contain" onerror="this.style.display='none'">
            <!-- Ícono fallback si no hay logo -->
        </div>

        <h1 class="mt-4 text-2xl font-bold text-[#000000]">Iniciar Sesión</h1>
        <p class="mt-1 text-sm text-[#808080]">Ingresa tus credenciales para continuar</p>
      </div>

      <!-- Separador -->
      <div class="mx-8 h-px bg-gradient-to-r from-transparent via-[#808080]/20 to-transparent"></div>

      <!-- Contenido -->
      <div class="p-8">
        @if ($errors->any())
          <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <ul class="list-disc list-inside space-y-1">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" class="space-y-5">
          @csrf

          <!-- Email -->
          <div>
            <label for="email" class="block mb-1.5 text-sm font-semibold text-[#465C47]">Correo Electrónico</label>
            <div class="relative">
              <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                required
                autofocus
                class="w-full rounded-xl border border-[#808080]/40 bg-white px-4 py-2.5 pr-10 text-[#000000] placeholder-[#808080] outline-none transition focus:border-[#008000] focus:ring-2 focus:ring-[#008000]/30"
                placeholder="tu@correo.com" />
              <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-5 w-5 text-[#808080]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 12H8m8 0a8 8 0 11-16 0 8 8 0 0116 0zm0 0v.01" />
              </svg>
            </div>
          </div>

          <!-- Password -->
          <div>
            <label for="password" class="block mb-1.5 text-sm font-semibold text-[#465C47]">Contraseña</label>
            <div class="relative">
              <input
                id="password"
                name="password"
                type="password"
                required
                class="w-full rounded-xl border border-[#808080]/40 bg-white px-4 py-2.5 pr-10 text-[#000000] placeholder-[#808080] outline-none transition focus:border-[#008000] focus:ring-2 focus:ring-[#008000]/30"
                placeholder="••••••••" />
              <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-5 w-5 text-[#808080]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 15c1.657 0 3-1.79 3-4s-1.343-4-3-4-3 1.79-3 4 1.343 4 3 4z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z" />
              </svg>
            </div>
          </div>

          <!-- Recordarme + Olvidé -->
          <div class="flex items-center justify-between text-sm">
            <label class="inline-flex items-center gap-2 select-none text-[#465C47]">
              <input type="checkbox" name="remember" class="h-4 w-4 rounded border-[#808080]/50 text-[#008000] focus:ring-[#008000]" />
              Recordarme
            </label>
            <a href="{{ route('password.request') ?? '#' }}" class="font-medium text-[#008000] hover:underline">
              ¿Olvidaste tu contraseña?
            </a>
          </div>

          <!-- Botón -->
          <button type="submit"
            class="w-full rounded-xl bg-[#008000] py-3 font-semibold text-white shadow-md shadow-[#008000]/20 transition hover:brightness-95 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#008000]">
            Entrar
          </button>
        </form>
      </div>

      <!-- Pie -->
      <div class="px-8 pb-8 text-center">
        <p class="text-xs text-[#808080]">
          © {{ date('Y') }} — Todos los derechos reservados
        </p>
      </div>
    </div>
  </div>

</body>
</html>
