const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const { merge } = require('webpack-merge');
const parts = require('./webpack.parts.js');

const dashboardChunk = ['dashboard'];

let htmlPageNames = [
  ['dashboard', dashboardChunk],
  ['login', ['datos']],
  ['olv_contrasena', null],
  ['registrar', ['datos']],
  ['sobreNosotros', dashboardChunk],
  ['detallesNoticia', dashboardChunk],
  ['futbolPeruano', dashboardChunk],
  ['ultimasNoticias', dashboardChunk],
  ['futbolInternacional', dashboardChunk],
];

let multipleHtmlPlugins = htmlPageNames.map(info => {
  const [ nameHTML, chunks ] = info;
  
  if(chunks) {
    return new HtmlWebpackPlugin({
      template: `./src/html/${nameHTML}.html`,
      filename: `${nameHTML}.html`,
      chunks
    })
  } else {
    return new HtmlWebpackPlugin({
      template: `./src/html/${nameHTML}.html`,
      filename: `${nameHTML}.html`,
      chunks: []
    })
  }
});

module.exports = merge(
  {
    entry: {
      dashboard: './src/js/dashboard.js',
      datos: './src/js/datos.js'
    },
    plugins: [].concat(multipleHtmlPlugins)
  },
  parts.loadHtml(),
  parts.loadFileImages({ output: 'assets' })
);
