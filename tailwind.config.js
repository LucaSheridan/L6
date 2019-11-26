module.exports = {
  theme: {
    pagination: theme => ({
        // Costumize the color only. (optional)
        color: theme('colors.gray.500'),
        link: 'bg-white px-3 py-1 border-r border-t border-b text-black no-underline',
        wrapper: 'inline-flex mt-4 shadow rounded',


        }),

    height: {
     '0': '0',
     '1/4': '25%',
     '1/2': '50%',
     '3/4': '75%',
     'full': '80%',
    },


    extend: {}
  },


  variants: {},
  plugins: [
  	require('@tailwindcss/custom-forms'),
    require('tailwindcss-plugins/pagination'),
  ]
}


	 