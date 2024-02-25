import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/news.js', 'resources/js/styles.js', 'resources/js/popup.js'],
            refresh: true,
        }),
    ],
});
