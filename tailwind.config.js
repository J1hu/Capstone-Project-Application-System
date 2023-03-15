const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/views/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./app/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            animation: {
                marquee: 'marquee 25s linear infinite',
                marquee2: 'marquee2 25s linear infinite',
              },
              keyframes: {
                marquee: {
                  '0%': { transform: 'translateX(0%)' },
                  '100%': { transform: 'translateX(-100%)' },
                },
                marquee2: {
                  '0%': { transform: 'translateX(100%)' },
                  '100%': { transform: 'translateX(0%)' },
                },
              },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
