import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import stylus from 'stylus';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.module.styl', 'resources/js/app.js'],
            refresh: true,
        }),
        stylus({
            modules: {
                // scopeBehaviour: 'local',
                // generateScopedName: '[name]__[local]--[hash:base64:5]',
                // hashPrefix: 'prefix-',
                // localsConvention: 'camelCaseOnly',
                localsConvention: 'camelCase',
            },
            // import: [],
        }),
    ]/* ,
    resolve: {
        alias: {
            '@': '/resources/js',
        },
    },
    build: {
        outDir: 'public/build',
        rollupOptions: {
            output: {
                entryFileNames: 'assets/[name].[hash].js',
                chunkFileNames: 'assets/chunks/[name].[hash].js',
                assetFileNames: 'assets/[name].[hash].[ext]',
            },
        },
    }, */
});
