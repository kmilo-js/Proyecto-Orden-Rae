let indiceDiapositiva = 1; // Variable para controlar qué imagen se muestra

//  Espera que toda la página esté cargada
window.onload = function() {
    mostrarDiapositiva(indiceDiapositiva); //Muestra la primera imagen automáticamente
};

// ➕ Avanzar o retroceder en el slideshow
function cambiarDiapositiva(n) {
    mostrarDiapositiva(indiceDiapositiva += n);
}

// 🔘 Ir directamente a un slide específico
function irADiapositiva(n) {
    mostrarDiapositiva(indiceDiapositiva = n);
}

// 🎞️ Función principal que muestra las imágenes
function mostrarDiapositiva(n) {
    let i;
    let diapositivas = document.getElementsByClassName("diapositiva");
    let puntos = document.getElementsByClassName("punto");

    // Si llegas al final, vuelve a la primera imagen
    if (n > diapositivas.length) { indiceDiapositiva = 1 }
    // Si te pasas del principio, muestra la última imagen
    if (n < 1) { indiceDiapositiva = diapositivas.length }

    // Oculta todas las imágenes
    for (i = 0; i < diapositivas.length; i++) {
        diapositivas[i].style.display = "none";
    }

    // Quita la clase "active" de todos los puntitos
    for (i = 0; i < puntos.length; i++) {
        puntos[i].className = puntos[i].className.replace(" activo", "");
    }

    // Muestra solo la imagen actual
    diapositivas[indiceDiapositiva - 1].style.display = "block";
    // Añade la clase "activo" al puntito correspondiente
    puntos[indiceDiapositiva - 1].className += " activo";
}
