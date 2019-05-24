const path = require('path');
var HtmlWebpackPlugin = require('html-webpack-plugin');
module.exports = {
  entry: { main: './app/index.js' },
  output: {
    path: path.resolve(__dirname, 'js'),
    filename: 'bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: {loader: "babel-loader"}
      },
      {
        test: /\.css$/,
        use: ["style-loader", "css-loader"]
      },
      {
        test:/\.scss$/,
        use: {
          loader: 'sass-loader',
          options: {sourceMap: true,}
        }
      },
    ]
  }, 
        //  plugins: [
        //     new HtmlWebpackPlugin({hash:true,template:'./public/index.html',filename:"index.html"}),]
  }