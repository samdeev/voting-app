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
            colors: {
                'gray-background': '#f7f8fc',
                'blue': '#328af1',
                'blue-hover': '#2879bd',
                'yellow': '#ffc737',
                'red': '#ec454f',
                'green': '#1aab8b',
                'purple': '#8b60ed'
            },
            maxWidth: {
                'custom': '62.5rem'
            },
            width: {
                'cw-1': '17.5rem',
                'cw-2': '43.75rem'
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
