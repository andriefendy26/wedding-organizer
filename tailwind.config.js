/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/views/**/*.php",
  ],
  darkMode: 'class',
  theme: {
      extend: {
          fontFamily: {
              'sans': ['Figtree', 'sans-serif'],
          },
          colors: {
            primary: "#B2110E",
            secondary: "#D4201C",
          },
      }
  },
  plugins: [],
}

