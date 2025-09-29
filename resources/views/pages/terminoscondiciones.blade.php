<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones - La Super Bodega del Mueble</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-principal: #1A1A1A;
            --color-titulo: #3A2E2A;
            --color-acento: #C2AE92;
            --color-fondo: #FDF5E6;
            --color-separador: #E8E2D5;
            --color-sombra: rgba(0,0,0,0.08);
            --color-sombra-hover: rgba(0,0,0,0.12);
        }

        /* BODY */
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background: var(--color-fondo);
            color: var(--color-principal);
            line-height: 1.8;
            overflow-x: hidden;
        }

        /* HEADER */
        header {
            text-align: center;
            padding: 70px 20px 50px;
            background: linear-gradient(145deg, #fdf5e6, #ffffff);
            position: relative;
            overflow: hidden;
        }

        header::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: var(--color-acento);
            border-radius: 50%;
            opacity: 0.1;
            z-index: 0;
        }

        header img {
            width: 160px;
            border-radius: 15px;
            border: 2px solid var(--color-acento);
            box-shadow: 0 10px 25px var(--color-sombra);
            transition: all 0.4s ease;
            position: relative;
            z-index: 1;
        }

        header img:hover {
            transform: scale(1.08) rotate(2deg);
            box-shadow: 0 15px 35px var(--color-sombra-hover);
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 900;
            color: var(--color-titulo);
            margin: 25px 0 10px;
            position: relative;
            z-index: 1;
        }

        .hero-title::after {
            content: "";
            width: 60px;
            height: 4px;
            background: var(--color-acento);
            display: block;
            margin: 10px auto 0;
            border-radius: 2px;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--color-acento);
            font-weight: 500;
            margin-top: 10px;
        }

        /* MAIN CONTAINER */
        .main-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 20px;
        }

        /* SECTIONS */
        .section-legal {
            background: #fff;
            border-radius: 25px;
            padding: 45px 35px;
            margin-bottom: 50px;
            box-shadow: 0 15px 40px var(--color-sombra);
            border-left: 5px solid var(--color-acento);
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.7s ease-out;
            transition-property: opacity, transform, box-shadow;
        }

        .section-legal.visible {
            opacity: 1;
            transform: translateY(0);
            box-shadow: 0 20px 50px var(--color-sombra-hover);
        }

        .section-legal:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: 0 25px 60px var(--color-sombra-hover);
        }

        .section-legal h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.3rem;
            color: var(--color-titulo);
            margin-bottom: 18px;
            font-weight: 900;
            position: relative;
        }

        .section-legal h2::after {
            content: "";
            width: 60px;
            height: 4px;
            background: var(--color-acento);
            display: block;
            margin-top: 8px;
            border-radius: 2px;
        }

        .section-legal h3 {
            font-size: 1.3rem;
            color: var(--color-titulo);
            margin-top: 25px;
            margin-bottom: 12px;
            font-weight: 700;
        }

        .section-legal p,
        .section-legal ul {
            font-size: 1.15rem;
            line-height: 1.7;
        }

        .section-legal ul {
            list-style: disc inside;
            padding-left: 15px;
        }

        .section-legal li {
            margin-bottom: 8px;
        }

        /* BOTON */
        .btn-contact {
            display: inline-block;
            background: var(--color-acento);
            color: var(--color-titulo);
            font-weight: 700;
            padding: 15px 45px;
            border-radius: 50px;
            text-decoration: none;
            margin: 30px 0;
            transition: all 0.4s ease;
            box-shadow: 0 6px 18px rgba(194, 174, 146, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-contact::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--color-titulo);
            transition: left 0.4s ease;
            z-index: -1;
        }

        .btn-contact:hover {
            background: var(--color-titulo);
            color: var(--color-acento);
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 10px 25px rgba(194, 174, 146, 0.5);
        }

        .btn-contact:hover::before {
            left: 0;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            .hero-subtitle {
                font-size: 1rem;
            }
            .section-legal {
                padding: 30px 20px;
                margin-bottom: 35px;
            }
        }

        /* IMAGENES EN SECCIONES (OPCIONAL) */
        .section-img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 15px;
            margin-top: 20px;
            box-shadow: 0 10px 25px var(--color-sombra);
            transition: transform 0.4s ease;
        }

        .section-img:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>

    <header>
        <!-- LOGO -->
        <img src="{{ asset('Img/logo_superbodega.jpg') }}" alt="Logo La Super Bodega del Mueble">
        <h1 class="hero-title">TÉRMINOS Y CONDICIONES</h1>
        <p class="hero-subtitle">Transparencia y confianza en cada compra</p>
    </header>

    <main class="main-container">

        <section id="general" class="section-legal">
            <h2>1. Disposiciones Generales</h2>
            <h3>Aceptación del Contrato</h3>
            <p>El uso del portal o la confirmación de la orden implica la aceptación de los términos vigentes y de cualquier modificación futura.</p>
            <!-- Ejemplo de imagen opcional -->
            <!-- <img src="{{ asset('Img/general.jpg') }}" alt="Disposiciones generales" class="section-img"> -->
        </section>

        <section id="productos" class="section-legal">
            <h2>2. Productos y Precios</h2>
            <h3>Garantía Visual</h3>
            <p>Las imágenes son aproximadas. Los colores y texturas pueden variar entre lotes.</p>
            <ul>
                <li>Dimensiones ±2 cm</li>
                <li>Stock confirmado tras el pago</li>
            </ul>
            <!-- Ejemplo de imagen opcional -->
            <!-- <img src="{{ asset('Img/productos.jpg') }}" alt="Productos" class="section-img"> -->
        </section>

        <section id="pedidos" class="section-legal">
            <h2>3. Pedidos y Pago</h2>
            <h3>Plazo de Cancelación</h3>
            <p>24 horas tras confirmación para cancelar sin cargos.</p>
        </section>

        <section id="entrega" class="section-legal">
            <h2>4. Entrega y Envío</h2>
            <h3>Responsabilidad de Acceso</h3>
            <p>El cliente debe informar restricciones de acceso; sobrecostos serán responsabilidad del cliente.</p>
        </section>

        <section id="garantia" class="section-legal">
            <h2>5. Garantía y Devoluciones</h2>
            <h3>Garantía Estándar</h3>
            <p>1 año contra defectos de fabricación, excluyendo desgaste natural o mal uso.</p>
        </section>

        <section id="propiedad" class="section-legal" style="border-left:none;">
            <h2>6. Propiedad Intelectual</h2>
            <p>Todos los diseños y textos son propiedad de La Super Bodega del Mueble.</p>
        </section>

        <a href="/contacto" class="btn-contact">Contáctanos</a>
    </main>

    <script>
        const sections = document.querySelectorAll('.section-legal');
        window.addEventListener('scroll', () => {
            const trigger = window.innerHeight / 1.2;
            sections.forEach(section => {
                const top = section.getBoundingClientRect().top;
                if (top < trigger) {
                    section.classList.add('visible');
                }
            });
        });

        // Asegurar que las secciones visibles se muestren al cargar si ya están en viewport
        window.addEventListener('load', () => {
            sections.forEach(section => {
                const top = section.getBoundingClientRect().top;
                if (top < window.innerHeight / 1.2) {
                    section.classList.add('visible');
                }
            });
        });
    </script>

</body>
</html>