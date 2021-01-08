const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const { merge } = require('webpack-merge');
const parts = require('./webpack.parts.js');

let htmlPageNames = [
  'dashboard',
  'login',
  'olv_contrasena',
  'registrar',
  'sobreNosotros',
  'detallesNoticia'
];

let multipleHtmlPlugins = htmlPageNames.map(name => {
  return new HtmlWebpackPlugin({
    template: `./src/html/${name}.html`,
    filename: `${name}.html`
  })
});

module.exports = merge(
  {
    entry: {
      dashboard: './src/js/dashboard.js'
    },
    plugins: [].concat(multipleHtmlPlugins)
  },
  parts.loadHtml(),
  parts.loadFileImages({ output: 'assets' })
);
