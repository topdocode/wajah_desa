/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./public/astrolus/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}",
        "./node_modules/flowbite/**/*.js",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                "primary" :"#f4c649",
                "secondary" :"#c3bf09",
                "third" :"#96940e",
                "four" : "#df9fa0"
            }
        },
    },
    plugins: [
        "./node_modules/flowbite/**/*.js"
    ]
}

