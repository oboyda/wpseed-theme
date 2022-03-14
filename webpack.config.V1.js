
const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');
const MiniCSSExtractPlugin = require('mini-css-extract-plugin');
const FixStyleOnlyEntriesPlugin = require('webpack-fix-style-only-entries');
const postcssPresetEnv = require('postcss-preset-env');

module.exports = {

    ...defaultConfig,

    // mode: 'production',
    entry: {
        ...defaultConfig.entry,
        style: path.resolve(process.cwd(), 'src/scss', 'index.scss')
    },
    module: {
        ...defaultConfig.module,
        rules: [
            ...defaultConfig.module.rules,
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    MiniCSSExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            url: false,
                            sourceMap: true,
                            importLoaders: 2
                        }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            sourceMap: true,
                            postcssOptions: {
                                plugins: () => [
                                    postcssPresetEnv({ browsers: 'last 2 versions' })
                                ]
                            }
                        }
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true,
                            sassOptions: {
                                outputStyle: 'compressed'
                            }
                        }
                    }
                ]
            }
        ]
    },
    plugins: [
        ...defaultConfig.plugins,
        new FixStyleOnlyEntriesPlugin(),
        new MiniCSSExtractPlugin({
            filename: '[name].min.css'
        })
    ]
};
