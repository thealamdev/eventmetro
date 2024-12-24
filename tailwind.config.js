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
                body: '#f6f6f6',
                primary: {
                    400: "#6D4DFF",
                    500: "rgb(109,77,266,4%)",
                    600: "#F5F2FF",
                    700: "rgb(109,77,266,4%)",
                },
                secondary: {
                    400: '#F3F4F6'
                },
                word: {
                    title: '#27313b',
                    paragraph: '#5e666e'
                },
                line: {
                    base: '#dddddd',
                }
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                body: ["Poppins", "sans-serif"],
            },
        },
        screens: {
            'sm': '380px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
        }
    },

    plugins: [forms],
};
