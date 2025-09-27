<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Document</title>
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
    <!-- Contenido principal del carrito -->
    <main class="contenedor-carrito">
        <h1>🛒 Tu Carrito de Compras</h1>

        <!-- Tabla con productos agregados -->
        <table class="tabla-carrito">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="{{asset('Img/Sofá1.JPG')}}" alt="Producto" class="img-producto"></td>
                    <td>Sofá 3 Puestos</td>
                    <td><input type="number" value="1" min="1" class="input-cantidad"></td>
                    <td>$850.000</td>
                    <td>$850.000</td>
                    <td><button class="btn-eliminar">🗑️</button></td>
                </tr>
            </tbody>
        </table>

        <!-- Total y botón de comprar -->
        <div class="resumen-carrito">
            <h3>Total: <span>$1.050.000</span></h3>
            <button class="btn-comprar">Finalizar Compra</button>
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