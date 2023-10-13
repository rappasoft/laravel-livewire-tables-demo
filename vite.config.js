import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';

export default defineConfig({
    build: {
        rollupOptions: {
            plugins: [
                resolve(),
                commonjs(),
            ],
            output: [{
                manualChunks: {
                    flatpickr: ['flatpickr']
                }
            }]
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css',
            ],
            refresh: true,
            postcss: [
                tailwindcss(),
                autoprefixer(),
                cssnano({
                    preset: 'default',
                }),
            ],
        })
    ],
    resolve: {
        alias: {
            '@': '/resources/js'
        }
    }

});
