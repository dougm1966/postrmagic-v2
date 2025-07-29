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
        },
    },

    plugins: [
        forms, 
        typography,
        require('daisyui')
    ],
    
    // daisyUI config
    daisyui: {
        themes: [
            {
                postrmagicLight: {
                    "primary": "#4F46E5",
                    "secondary": "#0EA5E9",
                    "accent": "#37CDBE",
                    "neutral": "#3D4451",
                    "base-100": "#FFFFFF",
                    "info": "#3ABFF8",
                    "success": "#36D399",
                    "warning": "#FBBD23",
                    "error": "#F87272",
                },
                postrmagicDark: {
                    "primary": "#6366F1",
                    "secondary": "#38BDF8",
                    "accent": "#4ADE80",
                    "neutral": "#191D24",
                    "base-100": "#1F2937",
                    "info": "#3ABFF8",
                    "success": "#36D399",
                    "warning": "#FBBD23",
                    "error": "#F87272",
                }
            }
        ],
        darkTheme: "postrmagicDark",
        logs: false,
    },
};