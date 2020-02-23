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
     '1/4': '25vh',
     '1/2': '50vh',
     '3/4': '75vh',
     '4/5': '80vh',
     'full': '100vh',
    },

    cursor: {
     'zoom-in': 'zoom-in',
   },


    extend: {}
  },


  variants: {},
  plugins: [
  	require('@tailwindcss/custom-forms'),
    require('tailwindcss-plugins/pagination'),
  ]
}


	 