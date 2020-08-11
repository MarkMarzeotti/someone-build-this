module.exports = {
  purge: [],
  theme: {
    extend: {
      transitionProperty: {
		'spacing': 'margin, padding',
		'height': 'height',
      }
	},
	height: {
	  'field-collapsed': '44px',
	  'field-expanded': '200px',
	}
  },
  variants: {
	padding: ['responsive', 'hover'],
	height: ['focus'],
  },
  plugins: [],
}
