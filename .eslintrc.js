module.exports = {
    "env": {
        "browser": true,
		"node": true
        // "es2021": true
    },
	"extends": [
        "plugin:@wordpress/eslint-plugin/esnext",
		"eslint:recommended"
    ],
    "parserOptions": {
        "ecmaVersion": "latest"
    },
	// "ignorePatterns": ["gulpfile.babel.js"],
    "rules": {
        "indent": [
            "error",
            "tab"
        ],
        "linebreak-style": [
            "error",
            "unix"
        ],
        "quotes": [
            "error",
            "single"
        ],
        "semi": [
            "error",
            "never"
        ],
		"no-console": "off",
		// "require-jsdoc" : 0,
    }
}
