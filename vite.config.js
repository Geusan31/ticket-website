import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/auth.css",
                "resources/css/dashboard.css",
                "resources/js/app.js",
                "resources/js/auth.js",
                "resources/js/bootstrap.js",
                "resources/js/dashboard.js",
                "resources/js/pembayaran.js",
                "resources/js/pemesanan.js",
                "resources/js/transportasi.js",
            ],
            refresh: true,
        }),
    ],
});
