import { defineConfig } from 'vite'
import path from 'path';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [
    tailwindcss(),
  ],
  build: {
    outDir: path.resolve(__dirname, 'build'), // output folder
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'src/index.js'),  // JS entry
        styles: path.resolve(__dirname, 'src/index.css') // CSS entry
      },
      output: {
        entryFileNames: 'index.js', // force output JS name
        assetFileNames: 'index.css' // CSS output name
      }
    }
  }
})