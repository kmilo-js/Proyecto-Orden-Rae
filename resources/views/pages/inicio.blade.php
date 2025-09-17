<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilos_inicio_session.css') }}">
    <title>Inicio de Sesión</title> 
</head>
<body>
    <main>      
            <div class="formulario-container">
                <form action="http://127.0.0.1:8000/" method="post" class="formulario2">
                    <div class="logotipo">
                    <img src="{{asset('Img/Logo1-orden.png')}}" alt="ORDER RAE">
                    </div>
                    <h2 class="titulo-formulario">Iniciar sesión</h2>
                        <!-- Iconos sociales -->
                        <div class="iconos-sociales">
                            <a href="https://accounts.google.com/signin" target="_blank" title="Google">
                                <img src="{{asset('Img/google.png')}}" alt="Google" class="icono-social">
                            </a>
                            <a href="https://web.facebook.com/" target="_blank" title="Facebook">
                                <img src="{{asset('Img/facebook.png')}}" alt="Facebook" class="icono-social">
                            </a>
                            <a href="https://www.icloud.com/" target="_blank" title="Apple">
                                <img src="{{asset('Img/apple.jpg')}}" alt="Apple" class="icono-social">
                            </a>
                        </div>
                    <p>Ingrese sus datos</p>
                    <label for="usuario"></label>
                    <input type="email" id="usuario" name="usuario" placeholder="✉️ Email" required>
                    <br>
                    <label for="contrasena"></label>
                    <input type="password" id="contrasena" name="contrasena" placeholder="🔒 Password" required>
                    <br>
                    <a href="recuperar.html" class="link-formulario">¿Olvidaste tu contraseña?</a>
                    <a href="registro.html" class="link-formulario">¿No tienes cuenta? Regístrate</a>
                    <button type="submit" class="boton-formulario">Iniciar Sesión</button>
                </form>
            </div>
    </main>
</body>
</html>