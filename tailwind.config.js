/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/views/**/*.{blade.php, js, vue}"],
  theme: {
    extend: {},
  },
  plugins: [require('flowbite')],
}

