import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/js/chonchon.js',
                'resources/scss/app.css',
            ],
            refresh: true,
        }),
    ],
});
