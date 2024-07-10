const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const TerserPlugin = require('terser-webpack-plugin')

module.exports = {
    mode: 'production',
    entry: [
        './resources/assets/js/index.js',
        './resources/assets/scss/app.scss'
    ],
    output: {
        filename: 'js/app.min.js',
        path: path.resolve(__dirname, 'public'),
    },
    watchOptions: {
        ignored: /node_modules/,
        // other options
    },
    optimization: {
        minimizer: [new TerserPlugin({
            extractComments: true,
        })],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'css/app.min.css',
            chunkFilename: 'css/[id].css'
        })
    ],
    module:  {
        rules: [
            {
                test: /\.s?css$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader'
                ]
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: []
            },
        ],
    }
}