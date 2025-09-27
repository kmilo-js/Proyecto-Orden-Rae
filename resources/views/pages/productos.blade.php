<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/estilos_productos.css') }}">
</head>
    <body class="font-sans antialiased">
        <!-- Encabezado principal del sitio -->
        <header id="barra_superior">
            <section class="cuadro_superior">
                <!-- Logo del sitio -->
                <div>
                    <a href="http://127.0.0.1:8000/" >
                        <img src="{{asset('Img/Logo3-orden.png')}}" class="logo_principal" alt="Logo Orden Rae" />
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
                        <img src="{{asset('Img/CarritoCompra2.png')}}" alt="Carrito" class="icono-img">
                    </a>
                    <div class="menu-usuario">
                        <a href="#" class="icono-usuario">
                            <img src="{{asset('Img/usuario2.png')}}" alt="Usuario" class="icono-img">
                        </a>
                        @if (Route::has('login'))
                            <div class="submenu">
                                    @auth
                                            <a
                                                href="{{ url('/dashboard') }}"                                            
                                            >
                                                Dashboard
                                            </a>
                                    @else
                                            <a
                                                href="{{ route('login') }}"
                                            >
                                                Iniciar sesión
                                            </a>
                                    @if (Route::has('register'))
                                            <a
                                                href="{{ route('register') }}"
                                            >
                                                Registrarse
                                            </a>
                                        @endif
                                    @endauth
                                @endif  
                            </div>
                        </div>
                    </div>
        </section>
        <section class="cuadro_inferior">
            <div>
                <!-- Menú de navegación con enlaces -->
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
  <main class="principal">
    <!-- Sección CATEGORÍAS -->
    <h2>CATEGORÍAS</h2>
    <h2>CATEGORÍAS</h2>
    <div class="productos-grid">
        <article class="producto">
            <h5>COLECHOS</h5>
            <img src="{{asset('Img/Colecho-1.jpg')}}" class="img-producto">
            <p><strong>DETALLES DEL PRODUCTO</strong></p>
            <p>Colecho de 1 metro de largo por 50 de ancho...</p>
        </article>

        <article class="producto">
            <h5>CAMA CUNAS</h5>
            <img src="{{asset('Img/CamaCunas1.JPG')}}" class="img-producto">
            <p><strong>DETALLES DEL PRODUCTO</strong></p>
            <p>Apta para un colchón del corral de 1 metro por 1.40...</p>
        </article>

        <article class="producto">
            <h5>SOFÁS</h5>
            <img src="{{asset('Img/Sofá4.JPG')}}" class="img-producto">
            <p><strong>DETALLES DEL PRODUCTO</strong></p>
            <p>Sofá de 2 puestos de 1.40 cm Largo por 80 cm de Ancho, con Tela Pet-Friendly y Antifluido.</p>
        </article>
        <article class="producto">
            <h5>POLTRONAS</h5>
            <img src="{{asset('Img/Poltronas1.JPG')}}" class="img-producto">
            <p><strong>DETALLES DEL PRODUCTO</strong></p>
            <p>La Poltrona Kaira destaca por su diseño compacto...</p>
        </article>

        <article class="producto">
            <h5>ESCRITORIOS</h5>
            <img src="{{asset('Img/Escritorio1.jpg')}}" class="img-producto">
            <p><strong>DETALLES DEL PRODUCTO</strong></p>
            <p>Escritorio de 1.30 cm de Ancho x 50 cm de Fondo...</p>
        </article>

        <article class="producto">
            <h5>CAMAS MONTESSORI</h5>
            <img src="{{asset('Img/CamaMontessori1.jpg')}}" class="img-producto">
            <p><strong>DETALLES DEL PRODUCTO</strong></p>
            <p>Apta para un colchón de 1 metro por 1.90...</p>
        </article>
    </div>
</main>



                <!-- Pie de página -->
                <hr>
                <footer class="footer">
                    <div class="footer-contenedor">
                <!-- Contacto -->
                <div class="footer-col">
                    <h3> CONTACTO </h3>
                    <hr>
                    <p> <strong> Teléfono fijo: </strong> 672 0380</p>
                    <p> <strong> Línea de atención: </strong>  (+57) 316 671 2526</p>
                    <p> <strong> Whatsapp ventas: </strong>  (+57) 316 671 2526</p>
                    <p> <strong> Dirección: </strong> Cra. 13 # 65 - 10 Bogotá</p>
                    <p> <strong> Email: </strong> contacto@lasuperbodega.com</p>
                    <p> <strong> Horario: </strong> Lunes a Sábado de 9:00 am - 6:00 pm</p>
                </div>

                <!-- Información -->
                <div class="footer-col">
                    <h3>INFORMACIÓN</h3>
                    <hr>
                    <p><a href="#">Quiénes somos</a></p>
                    <p><a href="#">Términos y condiciones</a></p>
                    <p><a href="#">Política de privacidad</a></p>
                    <p><a href="#">Preguntas frecuentes</a></p>
                    <p><a href="#">Contacto</a></p>
                </div>

                <!-- Mi cuenta -->
                <div class="footer-col">
                    <h3>MI CUENTA</h3>
                    <hr>
                    <p><a href="#">Acceder / Registrarse</a></p>
                    <p><a href="#">Recuperar / Cambiar contraseña</a></p>
                    <p><a href="#">Mis pedidos</a></p>
                    <p><a href="#">Seguimiento de envíos</a></p>
                    <p><a href="#">Aceptación de términos y condiciones</a></p>
                </div>

                <!-- Síguenos -->
                <div class="footer-col">
                    <h3>SÍGUENOS</h3>
                    <hr>
                    <div class="footer-redes">
                        <a href="#"><img src="{{asset('Img/Instagram (2).png')}}" alt="Instagram" /></a>
                        <a href="#"><img src="{{asset('Img/Facebook (2).png')}}" alt="Facebook" /></a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>