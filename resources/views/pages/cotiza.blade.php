<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotisar</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
        <!-- Contenido principal de la página -->
    <main>
    <!-- Encabezado principal del sitio -->
    <header id="barra_superior">
        <section class="cuadro_superior">
            <!-- Logo del sitio -->
            <div>
                <a href="http://127.0.0.1:8000/">
                    <img src="{{asset('Img/Logo1-orden.png')}}" alt="Logo de fábrica" class="logo_principal">
                </a>
            </div>

            <!-- Buscador -->
            <div>
                <input type="text" class="busqueda" placeholder="¿Qué producto deseas buscar?">
            </div>

            <!-- Botones de carrito y perfil -->
            <div class="botones">
            <a href="{{ route('carro-compra') }}" class="icono-carrito">
            <img src="{{asset('Img/CarritoCompra.png')}}" alt="Carrito" class="icono-img">
            </a>
            <div class="menu-usuario">
            <a href="#" class="icono-usuario">
            <img src="{{asset('Img/usuario.png')}}" alt="Usuario" class="icono-img">
            </a>
        <div class="submenu">
        <a href="inicio.html">Iniciar Sesión</a>
        <a href="registro.html">Registrarse</a>
    </div>
    </div>
            </div>
        </section>
        <section class="cuadro_inferior">
            <div>
                <!-- Menú de navegación con enlaces -->
                <nav class="navegacion">
                    <a href="http://127.0.0.1:8000/" class="home" aria-label="Ir a la página principal">Home</a>
                    <a href="{{ route('productos') }}" class="productos" aria-label="Ver productos">Productos</a>
                    <a href="{{ route('promociones') }}" class="promociones" aria-label="Ver promociones">Promociones</a>
                    <a href="{{ route('contacto') }}" class="contacto" aria-label="Contactar con nosotros">Contacto</a>
                    <a href="{{ route('cotiza') }}" class="boton_rojo" aria-label="Cotiza aquí">COTICE AQUI</a>
                </nav>
            </div>
        </section>
    </header>
    <!-- Línea divisoria -->
    <hr>
</body>
</html>