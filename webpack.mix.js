const mix = require('laravel-mix');
const {VueLoaderPlugin} = require('vue-loader');
// const  UglifyJsPlugin = require('uglifyjs-webpack-plugin');
// mix.options({
//     processCssUrls: false,
//     uglify: {
//         uglifyOptions: {
//             compress: {
//                 drop_console: true
//             }
//         }
//     }
// });
mix.webpackConfig({
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        },
        extensions: ['*', '.js', '.vue', '.json','.styl'],
        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: /(node_modules)/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: ['@babel/preset-env'],
                            plugins: ['@babel/transform-runtime']
                        }
                    }
                },
                {
                    test: /\.(png|svg|jpg|gif)$/,
                    use: ["file-loader"]
                },
                {
                    test: /\.s[ac]ss$/i,
                    use: [
                        // Creates `style` nodes from JS strings
                        'style-loader',
                        // Translates CSS into CommonJS
                        'css-loader',
                        // Compiles Sass to CSS
                        'sass-loader',
                    ],
                },
                { test: /\.css$/, loader: "stylus" },

            ]
        },
        plugins:[
            new VueLoaderPlugin()
        ]
    },
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js(['resources/js/app.js','resources/js/admin.js'], 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');
