<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Quiénes Somos - Visión Muebles</title>
    <style>
        /*
         * PALETA DE COLORES
         * --color-cafe-oscuro: #3A2E2A; (Más sobrio)
         * --color-crema: #F7F4EF; 
         * --color-secundario: #A88F80; 
         * --color-acento-claro: #C2AE92; 
         */

        :root {
            --color-principal: #3A2E2A; 
            --color-fondo: #F7F4EF; 
            --color-secundario: #A88F80; 
            --color-acento-claro: #C2AE92; 
            --color-texto: #333;
            --color-fondo-galeria: #FFFFFF;
        }

        body {
            font-family: 'Montserrat', sans-serif; /* Fuente moderna, clara y corporativa */
            background-color: var(--color-fondo);
            color: var(--color-texto);
            line-height: 1.6;
        }

        /* --- Hero Section (SOLO IMAGEN) --- */
        .hero-quienes {
            height: 350px;
            background-image: url("{{asset('Img/quieness.jpg')}}");
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        /* --- Título Principal (Fino y Elegante) --- */
        .hero-title-container {
            background-color: var(--color-acento-claro);
            color: var(--color-principal);
            padding: 30px 20px;
            text-align: center;
        }
        .hero-title {
            font-size: 3rem;
            font-weight: 500;
            letter-spacing: 10px;
            text-transform: uppercase;
        }

        /* --- Contenedor Principal (Split Screen Grid) --- */
        .contenedor-quienes {
            max-width: 1300px; /* Más ancho */
            margin: 60px auto;
            padding: 0 40px;
            display: grid;
            grid-template-columns: 1fr; 
            gap: 40px;
        }
        
        /* --- LADO IZQUIERDO: SECCIÓN DE TEXTO --- */
        .seccion-texto {
            padding-right: 20px;
            border-right: 1px solid var(--color-acento-claro); 
        }

        .seccion-texto h2 {
            font-size: 2.5rem; 
            color: var(--color-principal);
            margin-bottom: 25px;
            font-weight: 700;
        }
        
        /* Línea de acento fina */
        .seccion-texto h2::after {
            content: '';
            display: block;
            width: 70px;
            height: 3px;
            background-color: var(--color-secundario); 
            margin-top: 15px;
            margin-left: 0;
            border-radius: 2px;
        }

        /* Texto grande y legible */
        .seccion-texto p {
            font-size: 1.35rem; /* Ajuste sutil para Montserra/Helvetica */
            line-height: 1.7; 
            color: var(--color-texto);
            margin-bottom: 30px;
        }
        .seccion-texto strong {
            color: var(--color-secundario);
            font-weight: 700;
        }

        /* --- NUEVO: Seccion de Valores/Puntos Clave --- */
        .valores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid var(--color-acento-claro); /* Divisor sutil */
        }
        .valor-item h3 {
            font-size: 1.2rem;
            color: var(--color-principal);
            font-weight: 700;
            margin-bottom: 5px;
        }
        .valor-item p {
            font-size: 1rem;
            line-height: 1.4;
            color: #666;
            margin-bottom: 0;
        }
        
        /* --- LADO DERECHO: GALERÍA (En su propia caja blanca) --- */
        .galeria-quienes {
            background-color: var(--color-fondo-galeria); 
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            align-self: stretch; 
        }

        .galeria-quienes h2 {
            font-size: 2.2rem;
            color: var(--color-principal);
            margin-bottom: 25px;
            font-weight: 700;
        }

        .galeria-imagenes {
            display: grid;
            grid-template-columns: 1fr; 
            gap: 20px;
        }

        .galeria-imagenes img {
            width: 100%;
            /* CLAVE: Diferentes alturas para que parezca una mezcla de productos */
            height: 320px; 
            object-fit: cover;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Versión de escritorio: Grid de 2 columnas */
        @media (min-width: 900px) {
            .contenedor-quienes {
                grid-template-columns: 2fr 1.2fr; /* Texto dominante, Galería más compacta */
                align-items: start;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">

    <header class="hero-quienes"></header>

    <div class="hero-title-container">
        <h1 class="hero-title">QUIÉNES SOMOS</h1>
    </div>

    <main class="contenedor-quienes">

        <section class="seccion-texto">
            <h2>Nuestra Historia: Diseño para Cada Espacio del Hogar</h2>
            <p>
                **Visión Muebles** se fundó en **2015** con la ambición de ser la solución integral de mobiliario para el hogar moderno. Nuestra colección va más allá de un solo ambiente; nos especializamos en la fabricación de piezas que van desde elegantes **comedores y salones**, hasta mobiliario de oficina ergonómico y **cunas seguras y de diseño** para los más pequeños. Cada producto es una fusión perfecta entre **funcionalidad superior** y un **diseño moderno y atemporal**.
            </p>
            
            <h2>Excelencia, Artesanía y Confianza</h2>
            <p>
                Nuestra **misión** es ofrecer productos que perduren. El proceso de fabricación está regido por un estricto control de calidad y una **dedicación artesanal** en cada detalle, desde el acabado de la madera de su nuevo comedor hasta el ensamblaje de una cuna. Esta disciplina nos permite garantizar la **máxima satisfacción y confianza** en su inversión.
            </p>

            <h2>Nuestros Pilares</h2>
            <div class="valores-grid">
                <div class="valor-item">
                    <h3>Durabilidad Garantizada</h3>
                    <p>Uso de maderas nobles y materiales de alta resistencia para una larga vida útil.</p>
                </div>
                <div class="valor-item">
                    <h3>Diseño Versátil</h3>
                    <p>Mobiliario que se adapta desde la sala de estar hasta la habitación infantil.</p>
                </div>
                <div class="valor-item">
                    <h3>Artesanía Local</h3>
                    <p>Pasión por el detalle y técnicas artesanales en cada pieza que creamos.</p>
                </div>
            </div>
        </section>

        <section class="galeria-quienes">
            <h2>Colecciones que Inspiran</h2>
            <div class="galeria-imagenes">
                <img src="{{asset('Img/Poltronas1.JPG')}}" alt="Mueble - Poltrona para Salón">
                <img src="{{asset('Img/sillaEscritorio1.jpg')}}" alt="Mueble - Mobiliario de Oficina">
                <img src="{{asset('Img/silla1.jpg')}}" alt="Mueble - Comedores y Sillas">
                </div>
        </section>
    </main>

</body>
</html>