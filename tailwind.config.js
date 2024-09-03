const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
          colors: {
            header: "#2196F3",
            darkbg: "#303030",
            darkPrimary: "#1F2937",
            primaryCard: "#1c7cb0",
            secondaryCard: "#2d3987",
            tertiaryCard: "#13689c",
            quaternaryCard: "#2183b0",
            save: "#187d34",
            cancel: "#941506",
            textFieldPlaceholder: "#B4CEE5",
            textButtonChecked: "#8086BE",
            buttonChecked: "#4956AB",
            buttonCheck: "#3486D7",
            textFieldDisabled: "#7FC3E8",
        },
        fontFamily: {
            sans: [
                "Roboto",
                "Figtree",
                "sans-serif",
                ...defaultTheme.fontFamily.sans,
            ],
        },
    
      },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
