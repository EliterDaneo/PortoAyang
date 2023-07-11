/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: "50px",
        },
        extend: {
            colors: {
                primary: "#5f7adb",
                dark: "#26292b",
                secondary: "#2e3239",
            },
            screens: {
                "2xl": "1380px",
            },
        },
    },
    plugins: [],
};
