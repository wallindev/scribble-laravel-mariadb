import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.styl', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  server: {
    // hmr: false,
    host: 'localhost', // 0.0.0.0 for all interfaces
    /* proxy: {
      '/api': {
        target: 'http://localhost:3000', // Local API during dev
        changeOrigin: true,
      },
    }, */
    port: 5000,
    allowedHosts: ['localhost', '127.0.0.1', '192.168.32.2'],
    watch: {
      ignored: ['**/api-data/*.*', './TODO.txt'],
    },
  },
  /* stylus: {
    modules: {
      localsConvention: 'camelCase',
    },
  }, */
  css: {
    modules: {
      localsConvention: 'camelCase',
    },
  },
})
