<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos - ORDER RAE</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* ! tailwindcss v3.4.17 | MIT License | https://tailwindcss.com */
            /* ... (el CSS inline de Tailwind que ya tienes en tu layout) ... */
        </style>
    @endif

    <!-- Tu CSS personalizado (opcional) -->
    <link rel="stylesheet" href="{{ asset('css/estilos_productos.css') }}">
</head>
<body class="font-sans antialiased bg-gray-50">

    <!-- Encabezado principal del sitio -->
    <header id="barra_superior" class="mb-4">
        <section class="cuadro_superior">
            <!-- Logo del sitio -->
            <div>
                <a href="http://127.0.0.1:8000/">
                    <img src="{{ asset('Img/Logo3-orden.png') }}" class="logo_principal" alt="Logo Orden Rae" />
                </a>
            </div>
            <!-- Buscador -->
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
            <!-- Botones de carrito y perfil -->
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
    </header >

    <!-- Contenido principal -->
    <main">
        <div>
        <h2 class="text-3xl font-bold text-center text-[#7A4B32] mt-10 py-14">CATEGORÍAS</h2>
        </div>
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Producto 1: COLECHOS -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="h-56 overflow-hidden">
                    <img src="{{ asset('Img/Colecho-1.jpg') }}" alt="Colechos" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-semibold text-[#7A4B32] mb-2">COLECHOS</h3>
                    <p class="text-sm text-gray-600 mb-3"><strong>DETALLES DEL PRODUCTO</strong></p>
                    <p class="text-gray-700 text-sm leading-relaxed">Colecho de 1 metro de largo por 50 de ancho...</p>
                </div>
            </article>

            <!-- Producto 2: CAMA CUNAS -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="h-56 overflow-hidden">
                    <img src="{{ asset('Img/CamaCunas1.JPG') }}" alt="Cama Cunas" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-semibold text-[#7A4B32] mb-2">CUNAS</h3>
                    <p class="text-sm text-gray-600 mb-3"><strong>DETALLES DEL PRODUCTO</strong></p>
                    <p class="text-gray-700 text-sm leading-relaxed">Apta para un colchón del corral de 1 metro por 1.40...</p>
                </div>
            </article>

            <!-- Producto 3: SOFÁS -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="h-56 overflow-hidden">
                    <img src="{{ asset('Img/Sofá4.JPG') }}" alt="Sofás" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-semibold text-[#7A4B32] mb-2">SOFÁS</h3>
                    <p class="text-sm text-gray-600 mb-3"><strong>DETALLES DEL PRODUCTO</strong></p>
                    <p class="text-gray-700 text-sm leading-relaxed">Sofá de 2 puestos de 1.40 cm Largo por 80 cm de Ancho, con Tela Pet-Friendly y Antifluido.</p>
                </div>
            </article>

            <!-- Producto 4: POLTRONAS -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="h-56 overflow-hidden">
                    <img src="{{ asset('Img/Poltronas1.JPG') }}" alt="Poltronas" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-semibold text-[#7A4B32] mb-2">SILLAS</h3>
                    <p class="text-sm text-gray-600 mb-3"><strong>DETALLES DEL PRODUCTO</strong></p>
                    <p class="text-gray-700 text-sm leading-relaxed">La Poltrona Kaira destaca por su diseño compacto...</p>
                </div>
            </article>

            <!-- Producto 5: ESCRITORIOS -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="h-56 overflow-hidden">
                    <img src="{{ asset('Img/Escritorio1.jpg') }}" alt="Escritorios" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-semibold text-[#7A4B32] mb-2">ESCRITORIOS</h3>
                    <p class="text-sm text-gray-600 mb-3"><strong>DETALLES DEL PRODUCTO</strong></p>
                    <p class="text-gray-700 text-sm leading-relaxed">Escritorio de 1.30 cm de Ancho x 50 cm de Fondo...</p>
                </div>
            </article>

            <!-- Producto 6: CAMAS MONTESSORI -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="h-56 overflow-hidden">
                    <img src="{{ asset('Img/CamaMontessori1.jpg') }}" alt="Camas Montessori" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-semibold text-[#7A4B32] mb-2">CAMAS</h3>
                    <p class="text-sm text-gray-600 mb-3"><strong>DETALLES DEL PRODUCTO</strong></p>
                    <p class="text-gray-700 text-sm leading-relaxed">Apta para un colchón de 1 metro por 1.90...</p>
                </div>
            </article>
        </div>
    </div>
    </main>

    <!-- Pie de página -->
    <footer class="bg-[#efe7dd] text-black pt-12 pb-6">
        <div class="container mx-auto px-6 text-center">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('Img/order_rae.png') }}" alt="ORDER R.A.E" class="h-12 w-auto">
            </div>
            <div class="mb-6 space-x-4 text-base">
                <a href="{{ route('quienes.somos') }}" class="text-gray-700 hover:text-black">Quiénes somos</a> |
                <a href="{{ route('terminoscondiciones') }}" class="text-gray-700 hover:text-black">Terminos y  condiciones </a> |
                <a href="{{ route('preguntasfrecuentes') }}" class="text-gray-700 hover:text-black">preguntas frecuentes</a>
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
