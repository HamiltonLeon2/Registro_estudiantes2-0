import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.css'],
            refresh: true,
        }),
    ],
    server: {
        host: '192.168.1.102',
        port: 8080, // Cambiar a un puerto por encima de 1024
        hmr: {
            host: '192.168.1.102',
            port: 8080, // Asegúrate de que HMR también use el mismo puerto
        },
    },
    resolve: {
        alias: {
            $: 'jquery',
        },
    },
    build: {
        manifest: true,
        outDir: 'public/build',
    },
});
