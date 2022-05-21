module.exports = {
    "env": {
        "browser": true,
        "es2021": true
    },
	"extends": [
        "plugin:@wordpress/eslint-plugin/esnext",
		"eslint:recommended"
    ],
    "parserOptions": {
        "ecmaVersion": "latest"
    },
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
        ]
    }
}
