<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Document</title>
</head>
<body>
        <script src="myScript.js"></script>
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
        <a href="#"><img src="{{asset('Img/Instagram (2).png')}}" alt="Instagram" /></a>
        <a href="#"><img src="{{asset('Img/Facebook (2).png')}}" alt="Facebook" /></a>
      </div>
    </div>
  </div>
</footer>
</body>
</html>