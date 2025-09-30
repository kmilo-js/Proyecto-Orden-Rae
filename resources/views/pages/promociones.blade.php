<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Promociones - ORDER RAE</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* ! tailwindcss v3.4.17 | MIT License | https://tailwindcss.com */
            /* ... (tu CSS inline de Tailwind aquí) ... */
        </style>
    @endif

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body class="font-sans antialiased bg-gray-50">

    <!-- Encabezado (igual que en tus otras páginas) -->
    <header id="barra_superior" class="mb-4" >
        <section class="cuadro_superior">
            <div>
                <a href="http://127.0.0.1:8000/">
                    <img src="{{ asset('Img/Logo3-orden.png') }}" class="logo_principal" alt="Logo Orden Rae" />
                </a>
            </div>
            <div>
                <input 
                    type="text" 
                    class="busqueda"
                    name="Buscador" 
                    id="Buscador" 
                    placeholder="¿Qué producto deseas buscar?" 
                    class="w-full rounded-md border border-gray-300 bg-white px-4 py-2 text-base text-black placeholder-gray-500 shadow-sm focus:border-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-200 dark:text-white dark:placeholder-gray-400"
                />
            </div>
            <div class="botones">
                <a href="{{ route('carro-compra') }}" class="icono-carrito">
                    <img src="{{ asset('Img/CarritoCompra2.png') }}" alt="Carrito" class="icono-img">
                </a>
                <div class="menu-usuario">
                    <a href="#" class="icono-usuario">
                        <img src="{{ asset('Img/usuario2.png') }}" alt="Usuario" class="icono-img">
                    </a>
                    @if (Route::has('login'))
                        <div class="submenu">
                            @auth
                                <a href="{{ url('/dashboard') }}">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}">Iniciar sesión</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Registrarse</a>
                                @endif
                            @endauth
                        </div>
                    @endif  
                </div>
            </div>
        </section>
        <section class="cuadro_inferior">
            <div>
                <nav class="navegacion">
                    <a href="http://127.0.0.1:8000/" class="home" aria-label="Ir a la página principal">HOME</a>
                    <a href="{{ route('productos') }}" class="productos" aria-label="Ver productos">PRODUCTOS</a>
                    <a href="{{ route('promociones') }}" class="promociones" aria-label="Ver promociones">PROMOCIONES</a>
                    <a href="{{ route('contacto') }}" class="contacto" aria-label="Contactar con nosotros">CONTACTO</a>
                    <a href="{{ route('cotiza') }}" class="boton_rojo" aria-label="Cotiza aquí">COTICE AQUÍ</a>
                </nav>
            </div>
        </section>                        
    </header>

    <!-- Contenido principal -->
    <main>
        <section class="py-10 bg-gray-50">
            
                <div class="text-center pt-40">
                    <h2 id="promociones-titulo" class="text-3xl font-bold text-[#7A4B32] mb-4">PROMOCIONES EXCLUSIVAS</h2>
                    <p class="text-lg text-gray-600 pb-4">Renueva tu hogar, Hecho Por Manos Colombianas</p>
                </div>
            <div class="container mx-auto px-4">           
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Promoción 1: Sofá -->
                    <article class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="h-56 overflow-hidden">
                            <img src="{{ asset('Img/Sofá5.jpg') }}" alt="Sofá moderno 3 puestos en promoción" class="w-full h-full object-cover">
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-semibold text-[#7A4B32] mb-2">🛋 Sofá Moderno 3 Puestos</h3>
                        <div class="flex items-center gap-2 mb-3">
                                <span class="text-gray-500 line-through text-lg">Antes: $1.500.000</span>
                            </div>
                            <p class="text-2xl font-bold text-[#FF2D20] mb-4">Ahora: $1.050.000</p>
                            <button class="w-full bg-[#7A4B32] text-white py-2 px-4 rounded-lg font-medium hover:bg-[#6A3F2A] transition">Comprar ahora</button>
                        </div>
                    </article>

                    <!-- Promoción 2: Comedor -->
                    <article class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="h-56 overflow-hidden">
                            <img src="{{ asset('Img/Comedor3.jpeg') }}" alt="Comedor 8 puestos en promoción" class="w-full h-full object-cover">
                        </div>
                        <div class="p-5">
                        <h3 class="text-xl font-semibold text-[#7A4B32] mb-2">🍽 Comedor 6 Puestos</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-gray-500 line-through text-lg">Antes: $1.800.000</span>
                            </div>
                            <p class="text-2xl font-bold text-[#FF2D20] mb-4">Ahora: $1.390.000</p>
                            <button class="w-full bg-[#7A4B32] text-white py-2 px-4 rounded-lg font-medium hover:bg-[#6A3F2A] transition">Comprar ahora</button>
                        </div>
                    </article>

                    <!-- Promoción 3: Cama -->
                    <article class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="h-56 overflow-hidden">
                            <img src="{{ asset('Img/Cama2.jpg') }}" alt="Cama doble con cabecero en promoción" class="w-full h-full object-cover">
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-semibold text-[#7A4B32] mb-2">🛏 Cama Doble con Cabecero</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-gray-500 line-through text-lg">Antes: $1.100.000</span>
                            </div>
                            <p class="text-2xl font-bold text-[#FF2D20] mb-4">Ahora: $799.000</p>
                            <button class="w-full bg-[#7A4B32] text-white py-2 px-4 rounded-lg font-medium hover:bg-[#6A3F2A] transition">Comprar ahora</button>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer coherente con la página principal -->
    <footer class="bg-[#efe7dd] text-black pt-12 pb-6">
        <div class="container mx-auto px-6 text-center">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('Img/order_rae.png') }}" alt="ORDER R.A.E" class="h-12 w-auto">
            </div>
            <div class="mb-6 space-x-4 text-base">
                <a href="#" class="text-gray-700 hover:text-black">Quiénes somos</a> |
                <a href="#" class="text-gray-700 hover:text-black">Términos y condiciones</a> |
                <a href="#" class="text-gray-700 hover:text-black">Preguntas Frecuentes</a>
            </div>
            <div class="mb-6 space-x-4 text-base">
                <a href="#" class="text-gray-700 hover:text-black">Garantía</a> |
                <a href="#" class="text-gray-700 hover:text-black">Mis pedidos</a> |
                <a href="#" class="text-gray-700 hover:text-black">Seguimiento de envíos</a> |
                <a href="#" class="text-gray-700 hover:text-black">PQRS</a>
            </div>
            <div class="mb-8">
                <h3 class="text-xl font-bold mb-2">SEDE</h3>
                <p class="text-base text-gray-700">Carrera 13 # 65 - 10 | Bogotá - Colombia</p>
            </div>
            <div class="mb-8">
                <h3 class="text-xl font-bold mb-2">HORARIOS</h3>
                <p class="text-base text-gray-700">Lunes a Sábado 9AM – 6PM | Domingos y Festivos 10AM – 2PM</p>
            </div>
            <div class="mb-8">
                <h3 class="text-xl font-bold mb-2">CONTACTO</h3>
                <p class="text-base text-gray-700">
                    <span class="inline-block mr-2">📞 TELÉFONO FIJO:</span> 797 7090 |
                    <span class="inline-block mr-2">📞 VENTAS WHATSAPP:</span> (+57) 316 671 2526 |
                    <span class="inline-block mx-2">📞 SERVICIO AL CLIENTE:</span> (+57) 316 671 2526
                </p>
            </div>
            <div class="mb-4">
                <p class="text-base inline-block mr-2">SÍGUENOS EN:</p>
                <a href="#" class="inline-block mx-2">
                    <img src="{{ asset('Img/Facebook1.png') }}" alt="Facebook" class="h-6 w-6">
                </a>
                <a href="#" class="inline-block mx-2">
                    <img src="{{ asset('Img/Instagram1.png') }}" alt="Instagram" class="h-6 w-6">
                </a>
            </div>
            <div class="border-t border-gray-300 mt-6 pt-4 text-xs text-gray-600">
                &copy; {{ date('Y') }} ORDER RAE. Todos los derechos reservados.
            </div>
        </div>
    </footer>

</body>
</html>