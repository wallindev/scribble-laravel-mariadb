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
  // build: {
  //   outDir: 'dist',
  // },
  server: {
    // hmr: false,
    // host: 'localhost', // 0.0.0.0 for all interfaces
    proxy: {
      '/api': {
        target: 'http://localhost:3000', // Local API during dev
        changeOrigin: true,
      },
    },
    port: 5000,
    // allowedHosts: ['127.0.0.1', '192.168.32.2', 'grunge', 'grungecorp', 'grunge.dev', 'grungecorp.dev'],
    watch: {
      ignored: ['**/api-data/*.*', './TODO.txt'],
    },
  },
})
