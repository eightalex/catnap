const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const NODE_ENV = process.env.NODE_ENV || 'development';
const isDevelopment = NODE_ENV !== 'production';

module.exports = {
    entry: './resources/assets/js/index.js',
    mode: 'development',
    output: {
        path: path.resolve(__dirname, 'public'),
        filename: 'js/index.js',
    },
    resolve: {
        extensions: ['.js', '.sass']
    },
    devtool: isDevelopment ? 'source-map' : 'none',
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.sass$/,
                loader: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader',
                ]
            },
        ]
    },
    watchOptions: {
        ignored: /node_modules/
    },
    optimization: {
        minimize: !isDevelopment,
        minimizer: [
            new OptimizeCSSAssetsPlugin(),
        ],
    },
    plugins: [
        new VueLoaderPlugin(),
        new MiniCssExtractPlugin({
            filename: isDevelopment ? 'css/[name].css' : 'css/[name].css?v=[hash]',
            chunkFilename: isDevelopment ? 'css/[id].css' : 'css/[id].css?v=[hash]',
        }),
    ]
};