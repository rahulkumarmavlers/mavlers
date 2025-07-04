/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.{html,js}', 
    './**/*.handlebars', 
    './**/**/*.handlebars',
    './src/**/*.{html,js,jsx,ts,tsx}', // Added this line to match your new content paths
  ],
  theme: {
    extend: {
      fontSize: {
        'xs': '0.75rem', // 12px
        '1xs': '0.875rem', // 14px
        '2xs': ['1rem','1.5'], // 16px
        'base': ['1.125rem','1.61'], // 18px
        'sm': ['1.25rem','1.5'], // 20px
        'md': ['1.437rem', '1.58'], // 23px
        'xl': ['1.60rem','1.28'], // 26px
        '2xl': ['1.81rem', '1.28'], // 29px
        '3xl': ['2rem','1.3'], // 32px
        '4xl': ['2.25rem', '1.3'], // 36px
        '5xxl': ['2.875rem','1.3'], // 46px
        '5xl': ['3.625rem','1.3'], // 58px
        '6xl': ['4.1rem', '1.3'], // 66px
        '7xl': ['4.6rem', '1.21'], // 74px
        '8xl': ['5.18rem', '1.2'], // 83px
        '9xl': ['6.22rem', '1.4'], // 112px
      },
      letterSpacing: {
        '-sm': '-0.03125rem', // -0.5px
        '-xl': '-0.0625rem', // -1px
        '-2xl': '-0.125rem', // -2px
        'sm': '0.03125rem', // 0.5px
        'xl': '0.0625rem', // 1px
        '2xl': '0.125rem', // 2px

      },
      fontFamily: {
        primary: ['Plus Jakarta Sans', 'sans-serif'],
      },
      colors: {
        primary: '#3704FF', // blue
        secondary: '#F3FF64', // yellow
        text_primary: '#01062E', // Text Primary
        text_secondary: '#252F34', // Text Secondary
        success: '#03753A', // green
        warning: '#FFD642', // yellow
        danger: '#CC0000', // red
        light: '#EFEFEF', // light gray
        dark: '#707070', // dark gray
        gray100: '#BFC1CB' // gray 100
      },
      container: {
        center: true, // Center the container by default
        padding: {
          DEFAULT: '1rem', // Default padding for all screens
          'sm': '1rem', // Padding for small screens
          'md': '2rem', // Padding for medium screens
          'lg': '4rem', // Padding for large screens
          'xl': '6rem', // Padding for extra-large screens
          '2xl': '8.25rem', // Padding for 2xl screens
        },
        screens: {
          'sm': '100%', // Small screens
          'md': '100%', // Medium screens
          // 'xl': '1279px', // large screens
          '2xl': '1800px', // Extra large screens
        },
      },
      screens: {
        'xxs': '320px',
        'sm': '640px',
        'md': '768px',
        'lg': '1025px',
        'xl': '1280px',
        '2xl': '1500px',
        '3xl': '1700px'
      },
    },
  },
  plugins: [],
}
