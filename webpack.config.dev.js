const path = require('path');
const webpack = require('webpack');

module.exports = {
  devtool: 'cheap-eval-source-map',
  entry: [
    './resources/assets/js/main',
  ],
  output: {
    path: path.join(__dirname, 'public/assets/js/'),
    filename: 'bundle.js',
  },
  // plugins: [
  //   new webpack.HotModuleReplacementPlugin(),
  //   new HtmlWebpackPlugin({
  //     template: './app/index.html',
  //   }),
  // ],
  module: {
    loaders: [{
      test: /\.scss$/,
      loaders: ['style', 'css', 'sass'],
    }, {
      test: /\.js$/,
      loaders: ['babel'],
      include: path.join(__dirname, 'resources/assets/js/'),
    }],
  },
};
