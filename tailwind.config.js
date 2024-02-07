import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        'node_modules/preline/dist/*.js',
    ],

    theme: {
        fontFamily: {
            roboto: ['roboto', 'sans'],
            poppins: ['poppins', 'sans'],
            versal:['versal', 'sans-serif'],
            sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        },
        extend: {
        },
    },

    plugins: [
        forms,
        require('preline/plugin'),
    ],
};
