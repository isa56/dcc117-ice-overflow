/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    extend: {},
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#F2F7FB',
      'primary': '#6BBBB5',
      'primaryDark': '#5BA39D',
      'secondary': '#5F7D87',
      'secondaryDark': '#4A5E65',
      'background': '#232B30',
      'backgroundDark': '#1B2125' 
    },
    fontFamily: {
      regular: ['RobotoRegular'],
      medium: ['RobotoMedium'],
      bold: ['RobotoBold'],
      black: ['RobotoBlack']
    }
  },
  plugins: [],
}
