const webpack = require('webpack');
const postcss = require('postcss');
// const BrowserSync = require('browser-sync-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

const style = new ExtractTextPlugin({
	filename: './dist/css/style.css',
});

const admin = new ExtractTextPlugin({
	filename: './dist/css/admin.css',
});

module.exports = {
	entry: {
		app: './assets/js/app.js',
		admin: './assets/js/admin.js',
	},
	output: {
		path: __dirname,
		filename: 'dist/js/[name].js',
	},
	plugins: [
		style,
		admin,
		// new BrowserSync({
		// 	host: 'localhost',
		// 	port: 3000,
		// 	proxy: 'http://localhost',
		// })
	],
	devtool: 'source-map',
	module: {
		rules: [
			{
				test: /\.woff$/,
				exclude: /(node_modules)/,
				loader: 'url-loader?limit=10000&mimetype=application/font-woff',
				options: {
					name: 'dist/fonts/[name].[ext]',
				},
			},
			{
				test: /\.ttf$/,
				exclude: /(node_modules)/,
				loader: 'url-loader?limit=10000&mimetype=application/octet-stream',
				options: {
					name: 'dist/fonts/[name].[ext]',
				},
			},
			{
				test: /\.eot$/,
				exclude: /(node_modules)/,
				loader: 'file-loader',
				options: {
					name: 'dist/fonts/[name].[ext]',
				},
			},
			{
				test: /\.svg$/,
				exclude: /(node_modules)/,
				loader: 'url-loader?limit=10000&mimetype=image/svg+xml',
				options: {
					name: 'dist/fonts/[name].[ext]',
				},
			},
			{
				test: /\.js$/,
				exclude: /(node_modules)/,
				loader: ['babel-loader?presets=env'],
			},
			{
				test: /\.json$/,
				exclude: /(node_modules)/,
				loader: 'json-loader'
			},
			{
				test:/style.(scss|css)$/,
				use: style.extract({
					fallback: 'style-loader',
					use: [
						{
							loader: 'css-loader',
							options: {
								url: false,
								sourceMap: true,
							}
						},
						{
							loader: 'postcss-loader',
							options: {
								ident: 'postcss',
								sourceMap: true,
								plugins: [
									require('tailwindcss'),
									require('autoprefixer')(),
									require('cssnano')()
								],
							}
						},
						{
							loader: 'sass-loader',
							options: {
								sourceMap: true,
							}
						}
					]
				})
			},
			{
				test:/admin.(scss|css)$/,
				use: admin.extract({
					fallback: 'style-loader',
					use: [
						{
							loader: 'css-loader',
						},
						{
							loader: 'postcss-loader',
							options: {
								ident: 'postcss',
								plugins: [
									require('autoprefixer')(),
									require('cssnano')()
								]
							}
						},
						{
							loader: 'sass-loader'
						}
					]
				})
			},
		]
	}
}
