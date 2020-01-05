const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const NODE_ENV = process.env.NODE_ENV || 'production';

module.exports = {
    entry: './resources/assets/js/index.js',
    mode: 'development',
    output: {
        path: path.resolve(__dirname, 'public/js'),
        publicPath: 'js/',
        filename: 'index.js',
    },
    devtool: NODE_ENV === 'production' ? 'none' : 'source-map',
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            }
        ]
    },
    watchOptions: {
        ignored: /node_modules/
    },
    plugins: [
        new VueLoaderPlugin()
    ]
};