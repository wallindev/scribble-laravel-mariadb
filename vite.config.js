import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import stylus from 'stylus'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.module.styl', 'resources/js/app.js'],
            refresh: true,
        }),
        stylus({
            modules: {
                localsConvention: 'camelCase',
            },
        }),
    ],
})
