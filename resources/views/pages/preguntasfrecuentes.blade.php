<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preguntas Frecuentes - La Super Bodega del Mueble</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
  <style>
    :root {
      --color-fondo: #F5EFE3; /* Café crema */
      --color-principal: #3A2E2A; /* Café oscuro */
      --color-acento: #C2AE92; /* Pastel/Latón */
      --color-boton: #8B5E3C;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Montserrat', sans-serif;
      background: var(--color-fondo);
      color: var(--color-principal);
      line-height: 1.7;
    }

    /* HEADER */
    header {
      text-align: center;
      padding: 30px 20px;
      position: sticky;
      top: 0;
      z-index: 1000;
      background: var(--color-fondo);
    }
    header img {
      width: 140px;
      transition: transform 0.3s ease;
    }
    header img:hover {
      transform: scale(1.05);
    }
    header h1 {
      font-family: 'Playfair Display', serif;
      font-size: 2.8rem;
      font-weight: 900;
      margin: 15px 0 5px;
      color: var(--color-principal);
    }
    header p {
      font-size: 1.2rem;
      color: var(--color-acento);
      margin: 0;
    }

    /* MAIN CONTAINER */
    .main-container {
      max-width: 900px;
      margin: 50px auto;
      padding: 0 20px;
    }

    /* FAQ ACCORDEON */
    .faq-item {
      background: #fff;
      border-radius: 20px;
      margin-bottom: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      overflow: hidden;
    }

    .faq-question {
      width: 100%;
      text-align: left;
      padding: 18px 25px;
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--color-principal);
      background: var(--color-acento);
      border: none;
      cursor: pointer;
      transition: background 0.3s;
    }
    .faq-question:hover {
      background: var(--color-boton);
      color: #fff;
    }

    .faq-answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.6s cubic-bezier(0.4, 0, 0.2, 1); /* Animación más suave */
      padding: 0 25px;
      background: #fff;
    }
    .faq-answer p {
      margin: 15px 0;
      font-size: 1.1rem;
    }

    /* BOTON CONTACTO */
    .btn-contact {
      display: block;
      background: var(--color-boton);
      color: #fff;
      font-weight: 700;
      padding: 15px 50px;
      border-radius: 50px;
      text-decoration: none;
      margin: 40px auto 60px;
      text-align: center;
      transition: all 0.4s ease;
    }
    .btn-contact:hover {
      background: var(--color-acento);
      color: var(--color-principal);
      transform: translateY(-3px) scale(1.03);
    }

    /* RESPONSIVE */
    @media(max-width:768px){
      header h1{ font-size: 2rem; }
      header p{ font-size: 1rem; }
      .faq-question{ font-size: 1.1rem; padding: 15px 20px; }
      .faq-answer p{ font-size: 1rem; }
      .btn-contact{ padding: 12px 35px; font-size: 1.1rem; }
    }
  </style>
</head>
<body>

<header>
  <img src="{{asset('Img/Logo3-orden.png')}}" alt="Logo La Super Bodega del Mueble">
  <h1>Preguntas Frecuentes</h1>
  <p>Resuelve tus dudas de forma rápida y clara</p>
</header>

<main class="main-container">

  <div class="faq-item">
    <button class="faq-question">¿Cuánto tardará mi pedido en llegar?</button>
    <div class="faq-answer">
      <p>El tiempo de entrega depende de la ubicación y tipo de producto. Normalmente se entrega entre 3 y 7 días hábiles.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">¿Puedo devolver un mueble si no me gusta?</button>
    <div class="faq-answer">
      <p>Solo aceptamos devoluciones por defectos de fabricación o daños en transporte, siguiendo nuestras políticas de garantía.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">¿Realizan envíos a todo el país?</button>
    <div class="faq-answer">
      <p>Sí, realizamos envíos a todas las ciudades principales. Los costos se calculan al finalizar la compra.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">¿Los muebles vienen ensamblados?</button>
    <div class="faq-answer">
      <p>Algunos muebles requieren ensamblaje, que es sencillo y se incluye un manual. También ofrecemos servicio de armado opcional.</p>
    </div>
  </div>

  <a href="/contacto" class="btn-contact">Contáctanos</a>
</main>

<script>
  // Corrección: altura precisa sin amontonamiento, múltiples abiertos permitidos
  document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
      const answer = button.nextElementSibling;

      if (answer.style.maxHeight) {
        // Cerrar
        answer.style.maxHeight = null;
      } else {
        // Abrir: calcular altura total incluyendo padding
        const style = window.getComputedStyle(answer);
        const paddingTop = parseFloat(style.paddingTop);
        const paddingBottom = parseFloat(style.paddingBottom);
        const totalHeight = answer.scrollHeight + paddingTop + paddingBottom;
        answer.style.maxHeight = totalHeight + 'px';
      }
    });
  });
</script>

</body>
</html>