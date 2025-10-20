// tailwind.config.cjs
const defaultTheme = require('tailwindcss/defaultTheme')
const forms = require('@tailwindcss/forms')

// 👇 SIN el plugin de Preline (primero lo arrancamos estable)
module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './node_modules/preline/dist/*.js', // deja esto
  ],
  darkMode: 'class',
  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [forms],
}
