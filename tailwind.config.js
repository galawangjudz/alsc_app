/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/views/**/*.php", "./app/views/**/*.html"],
  theme: {
    extend: {},
  },
  plugins: [
    function ({ addVariant }) {
      addVariant("child", "& > *");
    },
  ],
};
