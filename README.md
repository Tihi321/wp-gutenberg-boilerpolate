It uses Object oriented approach of creating plugins, with one dynamic example plugin.

# VS Code Recommended Plugins

- [EditorConfig for VS Code](https://marketplace.visualstudio.com/items?itemName=EditorConfig.EditorConfig)
- [ESLint](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint)
- [stylelint](https://marketplace.visualstudio.com/items?itemName=shinnn.stylelint)
- [PHP DocBlocker](https://marketplace.visualstudio.com/items?itemName=neilbrayfield.php-docblocker)
- [phpcs](https://marketplace.visualstudio.com/items?itemName=ikappas.phpcs)
- [phpfmt - PHP formatter](https://marketplace.visualstudio.com/items?itemName=kokororin.vscode-phpfmt)
- [Prettier - Code formatter](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)


# VS Code User Settings
```bash
  "files.eol": "\n",
  "editor.insertSpaces": true,
  "phpcs.enable": true,
  "phpcs.standard": "Infinum",
  "editor.tabSize": 2,
  "phpfmt.indent_with_space": 2,
  "phpfmt.psr2": false,
  "phpfmt.cakephp": true,
```

# Requirements

Node 8+

# Setup

Download this folder in your plugins directory, change folder name, plugin name and text domain, then update variables in these files
- src/plugin-data.js
- inc/helpers/consts.php

Below you will find some information on how to run scripts.

## 👉  `npm start`
- Use to compile and run the block in development mode.
- Watches for any changes and reports back any errors in your code.

## 👉  `npm run build`
- Use to build production code for your block inside `assets` folder.
- Runs once and reports back the gzip file sizes of the produced code.

---

## Lints JS and SASS

```bash
npm run precommit
```

## Linting PHP

Plugin is using [Infinum coding standards for WordPress](https://github.com/infinum/coding-standards-wp) to check php files.

To install it, you need to install [Composer](https://getcomposer.org/) first.

Checking php for possible violations:

```bash
npm run precommitPhp
```

Autofix php for minor violations:

```bash
npm run autofixPhp
```

## Note

This plugin uses OOP with namespaces and autoloader.

When you add new class in your theme, be sure to run

```bash
composer -o dump-autoload
```

This boilerplate was bootstrapped with [Create Guten Block](https://github.com/ahmadawais/create-guten-block) and [Advanced Gutenberg Blocks](https://advanced-gutenberg-blocks.com/).
