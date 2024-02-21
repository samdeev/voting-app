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
                'custom': '68.5rem'
            },
            spacing: {
                22: '5.5rem',
                32: '8rem',
                34: '8.5rem',
                70: '17.5rem',
                76: '19rem',
                104: '26rem',
                700: '43.75rem'
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                'xxs': ['0.625rem', { lineHeight: '1rem' }]
            },
            boxShadow: {
                'card': '4px 4px 15px 0 rgba(36, 37, 38, 0.08)',
                'dialog': '3px 4px 15px 0 rgba(36, 37, 38, 0.22)'
            }
        },
    },

    plugins: [forms],
};
