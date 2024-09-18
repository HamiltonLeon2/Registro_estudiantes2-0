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
                nunito:['Nunito', 'sans-serif'],
                rubik:['Rubik', 'sans-serif']
            },
            colors: {
                '99cae7': '#99cae7',
                '329cca': '#329cca',
                '318fc3': '#318fc3',
                '14415b': '#14415b',
                'eaeeee': '#eaeeee',
                '6b95ab': '#6b95ab',
                'aaaaa6': '#aaaaa6',
                '969392': '#969392',
                '777064': '#777064',
                '624e49': '#624e49'
              },
        },
    },

    plugins: [forms],
};
