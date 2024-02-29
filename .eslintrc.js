module.exports = {
	env: {
		browser: true,
		node: true,
		// "es2021": true
	},
	extends: [
		'plugin:@wordpress/eslint-plugin/esnext',
		'eslint:recommended',
	],
	parserOptions: {
		ecmaVersion: 'latest',
	},
	// "ignorePatterns": ["gulpfile.babel.js"],
	rules: {
		indent: [
			'error',
			'tab',
		],
		quotes: [
			'error',
			'single',
		],
		semi: [
			'error',
			'never',
		],
		'no-console': 'off',
		// "require-jsdoc" : 0,
		'space-before-function-paren': [ 'error', {
			anonymous: 'never',
			named: 'never',
			asyncArrow: 'never',
		} ],
		'space-in-parens': [ 'error', 'never' ],
		'linebreak-style': [ 'error', 'windows' ],
		'computed-property-spacing': [ 'error', 'never' ],
	},
}
