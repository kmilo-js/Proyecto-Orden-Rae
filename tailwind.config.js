import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Colores personalizados según tu diseño
                'main': '#f8f4f1',       // Fondo principal
                'header': '#efe7dd',     // Fondo de header (si lo usas)
                'dark': '#333333',       // Texto oscuro
                'line': '#a7927d',       // Color de bordes/divisores
                'primary': '#764b36',    // Botones, links activos, acentos
                'secondary': '#e0e0e0',  // Botones secundarios
            },
        },
    },

    plugins: [forms, typography],
};