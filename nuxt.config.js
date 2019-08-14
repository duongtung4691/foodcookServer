const laravelNuxt = require("laravel-nuxt");
// const webpack = require("webpack");

module.exports = laravelNuxt({
    mode: 'universal',
    /*
    ** Headers of the page
    */
    head: {
        title: process.env.npm_package_name || '',
        meta: [
            {httpEquiv: 'X-UA-Compatible', content: 'IE=edge'},
            {charset: 'utf-8'},
            {name: 'viewport', content: 'width=device-width, initial-scale=1'},
            {hid: 'description', name: 'description', content: process.env.npm_package_description || ''}
        ],
        link: [
            {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'},
        ],
    },
    /*
    ** Customize the progress-bar color
    */
    loading: {color: '#fff'},
    /*
    ** Global CSS
    */
    css: [
        // '@/assets/css/bootstrap/bootstrap.min.css',
        // '@/assets/css/others/animate.css',
        // '@/assets/css/others/font-awesome.min.css',
        // '@/assets/css/others/meanmenu.min.css',
        // // '@/assets/css/others/owl.carousel.min.css',
        // '@/assets/css/others/pe-icon-7-stroke.css',
        // '@/assets/css/responsive/responsive.css',
        // '@/assets/css/default.css',
        // // '@/assets/css/style.css'
    ],
    /*
    ** Plugins to load before mounting the App
    */
    plugins: [
        {src: '~/plugins/markdown-plugins'},
        // {src : '~/plugins/bootstrap/bootstrap.min.js', ssr: false},
        // {src : '~/plugins/bootstrap/popper.min.js', ssr: false},
        // {src : '~/plugins/others/plugins.js' , ssr: false},
        // {src : '~/plugins/active.js', ssr: false}
    ],
    /*
    ** Nuxt.js dev-modules
    */
    devModules: [],
    /*
    ** Nuxt.js modules
    */
    modules: [
        // Doc: https://bootstrap-vue.js.org/docs/
        // 'bootstrap-vue/nuxt',
        // 'nuxt-fontawesome',
    ],
    /*
    ** Build configuration
    */
    build: {
        /*
        ** You can extend webpack config here
        */
        // vendor: ["jquery", "vue-notification"],
        // plugins: [
        //     new webpack.ProvidePlugin({
        //         $: "jquery",
        //         jQuery: 'jquery',
        //         'window.jQuery': 'jquery'
        //     })
        // ],
        extend(config, ctx) {
        }
    }
});
// module.exports = laravelNuxt({
//     // Options such as mode, srcDir and generate.dir are already handled for you.
//     modules: [],
//     plugins: [
//         {src: '~/plugins/markdown-plugins'}
//     ],
// });
