import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                nadaPink: '#FFF5F7',     // Soft blush background
                rosewood: '#743b3b',     // Deep accent tone
                dustyBlush: '#D88C9A',   // Hover tone
            },
        },
    },

    plugins: [forms],
};