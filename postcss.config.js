const autoPrefixer = require('autoprefixer');

const plugins = [
  autoPrefixer({
    browsers: [
      '>1%',
      'last 4 versions',
      'Firefox ESR',
      'not ie < 11', // React doesn't support IE8 anyway
    ],
    flexbox: 'no-2009',
    grid: true,
  }),
];

module.exports = {plugins};
