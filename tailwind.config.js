/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './pages/**/*.{html,js,php}',
    './components/**/*.{html,js,php}',
  ],
  theme: {
    extend: {
      colors: {
        'baby-shower-colors':{
          'lavanda': '#F6E5FB', // Cor Lavanda em formato HEX
          'light-purple': '#BDA6C2', // Cor Light Purple em formato HEX
          'dark-purple': '#5A076B', // Cor Dark Purple em formato HEX
          'purple': '#84179B', // Cor Purple em formato HEX
          'yellow': '#FFDD9A', // Cor Yellow em formato HEX
          'gray': '#F4F4F4'
        }
      }
    },
  },
  plugins: [],
}

