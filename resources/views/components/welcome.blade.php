<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-52 w-auto mx-auto rounded-full" />

    <h1 class="mt-8 text-2xl md:text-3xl font-semibold text-gray-800 text-center">
        Bienvenido a ORDER R.A.E
    </h1>

    <div class="mt-8 flex flex-wrap justify-center gap-6">
        <!-- Botón cuadrado: Usuarios -->
        <a href="{{ route('usuario.index') }}" class="w-40 h-40 flex flex-col items-center justify-center bg-gradient-to-br from-[#7A4B32] to-white rounded-xl shadow hover:from-[#6A3F2A] hover:to-gray-100 transition border border-[#7A4B32]">
            <span class="text-gray-800 font-semibold text-lg">Usuarios</span>
            <span class="text-gray-700 mt-2 text-xl font-bold">{{ $counts['usuarios'] ?? 0 }}</span>
        </a>

        <!-- Botón cuadrado: Productos -->
        <a href="{{ route('producto.index') }}" class="w-40 h-40 flex flex-col items-center justify-center bg-gradient-to-br from-[#7A4B32] to-white rounded-xl shadow hover:from-[#6A3F2A] hover:to-gray-100 transition border border-[#7A4B32]">
            <span class="text-gray-800 font-semibold text-lg">Productos</span>
            <span class="text-gray-700 mt-2 text-xl font-bold">{{ $counts['productos'] ?? 0 }}</span>
        </a>

        <!-- Botón cuadrado: Inventario -->
        <a href="{{ route('inventario.index') }}" class="w-40 h-40 flex flex-col items-center justify-center bg-gradient-to-br from-[#7A4B32] to-white rounded-xl shadow hover:from-[#6A3F2A] hover:to-gray-100 transition border border-[#7A4B32]">
            <span class="text-gray-800 font-semibold text-lg">Inventario</span>
            <span class="text-gray-700 mt-2 text-xl font-bold">{{ $counts['inventario'] ?? 0 }}</span>
        </a>

        <!-- Botón cuadrado: Fidelización -->
        <a href="{{ route('fidelizacion.index') }}" class="w-40 h-40 flex flex-col items-center justify-center bg-gradient-to-br from-[#7A4B32] to-white rounded-xl shadow hover:from-[#6A3F2A] hover:to-gray-100 transition border border-[#7A4B32]">
            <span class="text-gray-800 font-semibold text-lg">Fidelización</span>
            <span class="text-gray-700 mt-2 text-xl font-bold">{{ $counts['fidelizacion'] ?? 0 }}</span>
        </a>

        <!-- Botón cuadrado: Producción -->
        <a href="{{ route('produccion.index') }}" class="w-40 h-40 flex flex-col items-center justify-center bg-gradient-to-br from-[#7A4B32] to-white rounded-xl shadow hover:from-[#6A3F2A] hover:to-gray-100 transition border border-[#7A4B32]">
            <span class="text-gray-800 font-semibold text-lg">Producción</span>
            <span class="text-gray-700 mt-2 text-xl font-bold">{{ $counts['produccion'] ?? 0 }}</span>
        </a>

        <!-- Botón cuadrado: Pedidos -->
        <a href="{{ route('pedido.index') }}" class="w-40 h-40 flex flex-col items-center justify-center bg-gradient-to-br from-[#7A4B32] to-white rounded-xl shadow hover:from-[#6A3F2A] hover:to-gray-100 transition border border-[#7A4B32]">
            <span class="text-gray-800 font-semibold text-lg">Pedidos</span>
            <span class="text-gray-700 mt-2 text-xl font-bold">{{ $counts['pedidos'] ?? 0 }}</span>
        </a>
        <!-- Botón cuadrado: Categorías -->
        <a href="{{ route('categorias.index') }}" class="w-40 h-40 flex flex-col items-center justify-center bg-gradient-to-br from-[#7A4B32] to-white rounded-xl shadow hover:from-[#6A3F2A] hover:to-gray-100 transition border border-[#7A4B32]">
            <span class="text-gray-800 font-semibold text-lg">Categorías</span>
            <span class="text-gray-700 mt-2 text-xl font-bold">{{ $counts['categorias'] ?? 0 }}</span>
        </a>
    </div>
</div>

<div class="bg-gray-50 grid grid-cols-1 md:grid-cols-2 gap-8 p-6 lg:p-8">
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                Gestión Integral
            </h2>
        </div>
        <p class="mt-4 text-gray-600 text-sm leading-relaxed">
            Administra todos los aspectos de tu negocio desde una sola plataforma.
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                Hecho en Colombia
            </h2>
        </div>
        <p class="mt-4 text-gray-600 text-sm leading-relaxed">
            Muebles artesanales con calidad y diseño 100% colombiano.
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                Soporte Técnico
            </h2>
        </div>
        <p class="mt-4 text-gray-600 text-sm leading-relaxed">
            Equipo técnico especializado para resolver cualquier problema en tiempo récord.
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="size-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                Cotizaciones Personalizadas
            </h2>
        </div>
        <p class="mt-4 text-gray-600 text-sm leading-relaxed">
            Solicita cotizaciones a medida para tus proyectos más exigentes.
        </p>
    </div>
</div>