/**
 * Build
 *
 * The create-guten-block CLI builds here.
 */



// Do this as the first thing so that any code reading it knows the right env.
process.env.BABEL_ENV = 'production';
process.env.NODE_ENV = 'production';

// Makes the script crash on unhandled rejections instead of silently
// ignoring them. In the future, promise rejections that are not handled will
// terminate the Node.js process with a non-zero exit code.
process.on('unhandledRejection', (err) => {
  throw err;
});

// Modules.
const fs = require('fs');
const ora = require('ora');
const path = require('path');
const chalk = require('chalk');
const webpack = require('webpack');
const fileSize = require('filesize');
const gzipSize = require('gzip-size');
const config = require('../config/webpack.config.prod');
const clearConsole = require('../scripts/helpers/clear-console');
const formatWebpackMessages = require('../scripts/helpers/format-webpack-messages');

// Build file paths.
const theCWD = process.cwd();
const fileEditorJS = path.resolve(theCWD, './assets/js/blocks.editor.js');
const fileFrontendJS = path.resolve(theCWD, './assets/js/blocks.frontend.js');
const fileEditorCSS = path.resolve(
  theCWD,
  './assets/css/blocks.editor.style.css',
);
const fileFrontendCSS = path.resolve(
  theCWD,
  './assets/css/blocks.frontend.style.css',
);

/**
 * Get File Size
 *
 * Get filesizes of all the files.
 *
 * @param {string} filePath path.
 * @returns {string} then size result.
 */
const getFileSize = (filePath) => {
  return fileSize(gzipSize.sync(fs.readFileSync(filePath)));
};

//clearConsole();

// Init the spinner.
const spinner = new ora({ text: '' });

/**
 * Build function
 *
 * Create the production build and print the deployment instructions.
 *
 * @param {json} webpackConfig config
 */
async function build(webpackConfig) {

  // Compiler Instance.
  const compiler = await webpack(webpackConfig);

  // Run the compiler.
  compiler.run((err, stats) => {
    clearConsole();

    if (err) {
      return console.log(err);
    }

    // Get the messages formatted.
    const messages = formatWebpackMessages(stats.toJson({}, true));

    // If there are errors just show the errors.
    if (messages.errors.length) {

      // Only keep the first error. Others are often indicative
      // of the same problem, but confuse the reader with noise.
      if (1 < messages.errors.length) {
        messages.errors.length = 1;
      }

      // Formatted errors.
      clearConsole();
      console.log('\n❌ ', chalk.black.bgRed(' Failed to compile build. \n'));
      console.log('\n👉 ', messages.errors.join('\n\n'));

      // Don't go beyond this point at this time.
      return;
    }

    // CI.
    if (
      process.env.CI &&
      ('string' !== typeof process.env.CI ||
        'false' !== process.env.CI.toLowerCase()) &&
      messages.warnings.length
    ) {
      console.log(chalk.yellow('\nTreating warnings as errors because process.env.CI = true.\n' +
        'Most CI servers set it automatically.\n'));
      console.log(messages.warnings.join('\n\n'));
    }

    // Start the build.
    console.log(`\n ${chalk.dim('Let\'s build and compile the files...')}`);
    console.log('\n✅ ', chalk.black.bgGreen(' Built successfully! \n'));

    console.log(
      '\n\n',
      'File sizes after gzip:',
      '\n\n',
      getFileSize(fileEditorJS),
      `${chalk.dim('— ./assets/js/')}`,
      `${chalk.green('blocks.editor.js')}`,
      '\n',
      getFileSize(fileFrontendJS),
      `${chalk.dim('— ./assets/js/')}`,
      `${chalk.green('blocks.frontend.js')}`,
      '\n',
      getFileSize(fileEditorCSS),
      `${chalk.dim('— ./assets/css/')}`,
      `${chalk.green('blocks.editor.style.css')}`,
      '\n',
      getFileSize(fileFrontendCSS),
      `${chalk.dim('— ./assets/css/')}`,
      `${chalk.green('blocks.frontend.style.css')}`,
      '\n\n',
    );

    return true;
  });
}
build(config);
