<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto - ORDER RAE</title>

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
    <header id="barra_superior">
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
    <main class="max-w-7xl mx-auto px-4 py-10">
        <div class="text-center mt-40">
            <h1 class="text-4xl font-bold text-[#7A4B32] mb-4">📞 Contáctanos</h1>
            <p class="text-lg text-gray-600">¿Tienes preguntas, sugerencias o quieres cotizar? ¡Escríbenos!</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Formulario de contacto -->
            <div class="bg-white p-8 rounded-xl shadow-md">
                <form action="mailto:contacto@superbodega.com" method="post" enctype="text/plain">
                    <div class="mb-4">
                        <input type="text" name="nombre" placeholder="Tu nombre" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7A4B32] focus:border-transparent outline-none transition">
                    </div>
                    <div class="mb-4">
                        <input type="email" name="email" placeholder="Tu correo electrónico" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7A4B32] focus:border-transparent outline-none transition">
                    </div>
                    <div class="mb-4">
                        <input type="text" name="asunto" placeholder="Asunto" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7A4B32] focus:border-transparent outline-none transition">
                    </div>
                    <div class="mb-6">
                        <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." required rows="5"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7A4B32] focus:border-transparent outline-none transition"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-[#7A4B32] text-white py-3 px-4 rounded-lg font-medium hover:bg-[#6A3F2A] transition">
                        Enviar Mensaje
                    </button>
                </form>
            </div>

            <!-- Información de contacto -->
            <div class="bg-white p-8 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold text-[#7A4B32] mb-6">📍 Nuestra Ubicación</h2>
                <p class="text-gray-700 mb-6">Carrera 13 # 65 - 10, Bogotá D.C., Colombia</p>

                <h3 class="text-xl font-semibold text-[#7A4B32] mb-4">📱 Medios de Contacto</h3>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start">
                        <span class="mr-2">📧</span>
                        <span>contacto@lasuperbodega.com</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2">📞</span>
                        <span>Teléfono fijo: 797 7090</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2">📱</span>
                        <span>WhatsApp: (+57) 316 671 2526</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2">🕒</span>
                        <span>Horario: Lunes a Sábado 9AM – 6PM</span>
                    </li>
                </ul>

                <div class="mt-8">
                    <h4 class="text-lg font-semibold text-[#7A4B32] mb-3">Síguenos en redes:</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-[#7A4B32] transition">
                            <img src="{{ asset('Img/Facebook1.png') }}" alt="Facebook" class="h-6 w-6">
                        </a>
                        <a href="#" class="text-gray-600 hover:text-[#7A4B32] transition">
                            <img src="{{ asset('Img/Instagram1.png') }}" alt="Instagram" class="h-6 w-6">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer coherente con el resto del sitio -->
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