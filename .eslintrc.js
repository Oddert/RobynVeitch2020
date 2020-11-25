module.exports = {
  env: {
    browser: true,
    commonjs: true,
    es6: true,
    node: true
  },
  extends: ["eslint:recommended", "wordpress"],
  parserOptions: {
    sourceType: "module"
  },
  rules: {
    indent: ["error", "tab"],
    "linebreak-style": ["off", "unix"],
    quotes: ["error", "single"],
    semi: ["error", "never"],
    "space-in-parens": ["error", "always"],
    "spaced-comment": ["warn", "always"],
    "lines-around-comment": "off",
    "comma-dangle": "off",
    "no-trailing-spaces": {
      "skipBlankLines": true
    }
  }
};
