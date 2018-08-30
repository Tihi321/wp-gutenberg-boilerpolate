/**
 * Webpack Configuration
 *
 * Working of a Webpack can be very simple or complex. This is an intenally simple
 * build configuration.
 *
 * Webpack basics — If you are new the Webpack here's all you need to know:
 *     1. Webpack is a module bundler. It bundles different JS modules together.
 *     2. It needs and entry point and an ouput to process file(s) and bundle them.
 *     3. By default it only understands common JavaScript but you can make it
 *        understand other formats by way of adding a Webpack loader.
 *     4. In the file below you will find an entry point, an ouput, and a babel-loader
 *        that tests all .js files excluding the ones in node_modules to process the
 *        ESNext and make it compatible with older browsers i.e. it converts the
 *        ESNext (new standards of JavaScript) into old JavaScript through a loader
 *        by Babel.
 *
 * TODO: Instructions.
 *
 * @since 1.0.0
 */

const paths = require('./paths');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

// Main CSS loader for everything but blocks..
const blocksCSSPlugin = new ExtractTextPlugin({

  // Extracts CSS into a build folder inside the directory current directory
  filename: './assets/css/blocks.frontend.style.css',
});

// Main CSS loader for everything but blocks..
const editBlocksCSSPlugin = new ExtractTextPlugin({

  // Extracts CSS into a build folder inside the directory current directory
  filename: './assets/css/blocks.editor.style.css',
});

const extractConfig = {
  use: [
    { loader: 'css-loader' },
    { loader: 'postcss-loader' },
    {
      loader: 'sass-loader',
      options: {

        // Add common CSS file for variables and mixins.
        data: '@import "./src/common.scss";\n',
        outputStyle: 'nested',
      },
    },
  ],
};

// Export configuration.
module.exports = {
  entry: {
    './assets/js/blocks.editor': paths.pluginBlocksJs, // 'name' : 'path/file.ext'.
    './assets/js/blocks.frontend': paths.pluginFrontendJs, // 'name' : 'path/file.ext'.
  },
  output: {

    // Add /* filename */ comments to generated require()s in the output.
    pathinfo: true,

    // The dist folder.
    path: paths.pluginDist,
    filename: '[name].js', // [name] = './dist/blocks.build' as defined above.
  },

  // You may want 'eval' instead if you prefer to see the compiled output in DevTools.
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /\.(js|jsx|mjs)$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {

            // This is a feature of `babel-loader` for webpack (not Babel itself).
            // It enables caching results in ./node_modules/.cache/babel-loader/
            // directory for faster rebuilds.
            cacheDirectory: true,
          },
        },
      },
      {
        test: /style\.s?css$/,
        exclude: /(node_modules|bower_components)/,
        use: blocksCSSPlugin.extract(extractConfig),
      },
      {
        test: /editor\.s?css$/,
        exclude: /(node_modules|bower_components)/,
        use: editBlocksCSSPlugin.extract(extractConfig),
      },
    ],
  },

  // Add plugins.
  plugins: [blocksCSSPlugin, editBlocksCSSPlugin],
  stats: 'minimal',

  // stats: 'errors-only',
  // Add externals.
  externals: {
    react: 'React',
    'react-dom': 'ReactDOM',
    ga: 'ga', // Old Google Analytics.
    gtag: 'gtag', // New Google Analytics.
    jquery: 'jQuery', // import $ from 'jquery' // Use the WordPress version.
  },
};
