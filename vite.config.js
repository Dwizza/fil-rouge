import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        
    ],
    define: {
        'process.env': {}
    }
    
});
// VITE_PUSHER_APP_KEY="412d1ea885eb51fc2cee"
// VITE_PUSHER_APP_CLUSTER="eu"
