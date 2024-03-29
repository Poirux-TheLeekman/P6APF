/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');
// loads the jquery package from node_modules
 var $ = require('jquery');

 // import the function from greet.js (the .js extension is optional)
 // ./ (or ../) means to look for a local file
 var greet = require('./greet');

 $(document).ready(function() {
     $('body').prepend('<h1>'+greet('jill')+'</h1>');
 });
console.log('Hello Webpack Encore! Edit me in assets/js/app.js,OKOK');
