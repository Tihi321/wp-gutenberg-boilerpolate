This boilerplate is done on top of [Create Guten Block](https://github.com/ahmadawais/create-guten-block).

It uses Object oriented approach of creating plugins.

After you update folder, file, plugin name and text domain upon creating a new project, rename variables in these files
- src/plugin-data.js -> pluginData.domain with text domain
- inc/base/base-controller.php -> PLUGIN_FILE_NAME with root filename of the plugin, PLUGIN_DOMAIN with text domain

Below you will find some information on how to run scripts.

## 👉  `npm start`
- Use to compile and run the block in development mode.
- Watches for any changes and reports back any errors in your code.

## 👉  `npm run build`
- Use to build production code for your block inside `assets` folder.
- Runs once and reports back the gzip file sizes of the produced code.
