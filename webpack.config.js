// nodejs 中的path模块
var htmlWebpackPlugin = require("html-webpack-plugin");

module.exports = {
    // 入口文件，path.resolve()方法，可以结合我们给定的两个参数最后生成绝对路径，最终指向的就是我们的index.js文件
    entry: {
        app: __dirname + "/resources/src/js/app.js"
    },
    output: {
        path: __dirname + "/public/dist",
        filename: "js/[name]-[chunkhash].js"
    },
    devServer: {
        contentBase: "/public/dist",//本地服务器所加载的页面所在的目录
        historyApiFallback: true,//不跳转
        inline: true//实时刷新
    },
    resolve: {
        extensions: ['.js', '.vue'],
        alias: { 'vue': 'vue/dist/vue.js' }
    },
    plugins: [
        new htmlWebpackPlugin({
            filename: "index.html",
            template: "./resources/src/index.html",
            inject: false,
            title: "cw",
            chunks: ['app'],
        }),
    ],
    module: {
        loaders: [
            // 使用vue-loader 加载 .vue 结尾的文件
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.js$/,
                loader: "babel-loader",
                exclude: /node_modules/
            },
            {
                test: /\.css$/, loader: 'style-loader!css-loader'
            },
            {
                test: /\.(png|jpe?g|gif|svg)(\?.*)?$/,
                loader: 'url-loader',
                exclude: /node_modules/
            },
        ]
    }
}