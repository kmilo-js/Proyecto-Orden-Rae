<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/estilos_productos.css') }}">
</head>
<body>
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
            <img src="{{asset('Img/Cama Cunas1.JPG')}}" class="img-producto">
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
      <h3>CONTACTO</h3>
      <hr>
      <p>📱 (+57) 319 330 0380</p>
      <p>📱 (+57) 316 671 2526</p>
      <p>📍 Cra. 13 # 65 - 10, Bogotá</p>
    </div>

    <!-- Información -->
    <div class="footer-col">
      <h3>INFORMACIÓN</h3>
      <hr>
      <p><a href="#">Quiénes somos</a></p>
      <p><a href="#">Términos y condiciones</a></p>
      <p><a href="#">Preguntas frecuentes</a></p>
      <p><a href="#">Contacto</a></p>
    </div>

    <!-- Mi cuenta -->
    <div class="footer-col">
      <h3>MI CUENTA</h3>
      <hr>
      <p><a href="#">Acceder – Registrarse</a></p>
      <p><a href="#">Cambiar contraseña</a></p>
      <p><a href="#">Pedidos</a></p>
      <p><a href="#">Aceptación de términos y condiciones y políticas de datos</a></p>
    </div>

    <!-- Síguenos -->
    <div class="footer-col">
      <h3>SÍGUENOS</h3>
      <hr>
      <div class="footer-redes">
        <a href="#"><img src="Img/Instagram (2).png" alt="Instagram" /></a>
        <a href="#"><img src="Img/Facebook (2).png" alt="Facebook" /></a>
      </div>
    </div>
  </div>
</footer>
</body>
</html>