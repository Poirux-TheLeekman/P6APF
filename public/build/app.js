(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app"],{

/***/ "./assets/css/app.css":
/*!****************************!*\
  !*** ./assets/css/app.css ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you require will output into a single css file (app.css in this case)
__webpack_require__(/*! ../css/app.css */ "./assets/css/app.css"); // Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');
// loads the jquery package from node_modules


var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js"); // import the function from greet.js (the .js extension is optional)
// ./ (or ../) means to look for a local file


var greet = __webpack_require__(/*! ./greet */ "./assets/js/greet.js");

$(document).ready(function () {
  $('body').prepend('<h1>' + greet('jill') + '</h1>');
});
console.log('Hello Webpack Encore! Edit me in assets/js/app.js,OKOK');

/***/ }),

/***/ "./assets/js/greet.js":
/*!****************************!*\
  !*** ./assets/js/greet.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

// assets/js/greet.js
module.exports = function (name) {
  return "Yo yo ".concat(name, " - welcome to Encore!");
};

/***/ })

},[["./assets/js/app.js","runtime","vendors~app"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FwcC5jc3MiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvZ3JlZXQuanMiXSwibmFtZXMiOlsicmVxdWlyZSIsIiQiLCJncmVldCIsImRvY3VtZW50IiwicmVhZHkiLCJwcmVwZW5kIiwiY29uc29sZSIsImxvZyIsIm1vZHVsZSIsImV4cG9ydHMiLCJuYW1lIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7QUFBQSx1Qzs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7O0FBT0E7QUFDQUEsbUJBQU8sQ0FBQyw0Q0FBRCxDQUFQLEMsQ0FFQTtBQUNBO0FBQ0E7OztBQUNDLElBQUlDLENBQUMsR0FBR0QsbUJBQU8sQ0FBQyxvREFBRCxDQUFmLEMsQ0FFQTtBQUNBOzs7QUFDQSxJQUFJRSxLQUFLLEdBQUdGLG1CQUFPLENBQUMscUNBQUQsQ0FBbkI7O0FBRUFDLENBQUMsQ0FBQ0UsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUN6QkgsR0FBQyxDQUFDLE1BQUQsQ0FBRCxDQUFVSSxPQUFWLENBQWtCLFNBQU9ILEtBQUssQ0FBQyxNQUFELENBQVosR0FBcUIsT0FBdkM7QUFDSCxDQUZEO0FBR0RJLE9BQU8sQ0FBQ0MsR0FBUixDQUFZLHdEQUFaLEU7Ozs7Ozs7Ozs7O0FDdEJBO0FBQ0FDLE1BQU0sQ0FBQ0MsT0FBUCxHQUFpQixVQUFTQyxJQUFULEVBQWU7QUFDNUIseUJBQWdCQSxJQUFoQjtBQUNILENBRkQsQyIsImZpbGUiOiJhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW4iLCIvKlxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxuICpcbiAqIFdlIHJlY29tbWVuZCBpbmNsdWRpbmcgdGhlIGJ1aWx0IHZlcnNpb24gb2YgdGhpcyBKYXZhU2NyaXB0IGZpbGVcbiAqIChhbmQgaXRzIENTUyBmaWxlKSBpbiB5b3VyIGJhc2UgbGF5b3V0IChiYXNlLmh0bWwudHdpZykuXG4gKi9cblxuLy8gYW55IENTUyB5b3UgcmVxdWlyZSB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChhcHAuY3NzIGluIHRoaXMgY2FzZSlcbnJlcXVpcmUoJy4uL2Nzcy9hcHAuY3NzJyk7XG5cbi8vIE5lZWQgalF1ZXJ5PyBJbnN0YWxsIGl0IHdpdGggXCJ5YXJuIGFkZCBqcXVlcnlcIiwgdGhlbiB1bmNvbW1lbnQgdG8gcmVxdWlyZSBpdC5cbi8vIGNvbnN0ICQgPSByZXF1aXJlKCdqcXVlcnknKTtcbi8vIGxvYWRzIHRoZSBqcXVlcnkgcGFja2FnZSBmcm9tIG5vZGVfbW9kdWxlc1xuIHZhciAkID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XG5cbiAvLyBpbXBvcnQgdGhlIGZ1bmN0aW9uIGZyb20gZ3JlZXQuanMgKHRoZSAuanMgZXh0ZW5zaW9uIGlzIG9wdGlvbmFsKVxuIC8vIC4vIChvciAuLi8pIG1lYW5zIHRvIGxvb2sgZm9yIGEgbG9jYWwgZmlsZVxuIHZhciBncmVldCA9IHJlcXVpcmUoJy4vZ3JlZXQnKTtcblxuICQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICAkKCdib2R5JykucHJlcGVuZCgnPGgxPicrZ3JlZXQoJ2ppbGwnKSsnPC9oMT4nKTtcbiB9KTtcbmNvbnNvbGUubG9nKCdIZWxsbyBXZWJwYWNrIEVuY29yZSEgRWRpdCBtZSBpbiBhc3NldHMvanMvYXBwLmpzLE9LT0snKTtcbiIsIi8vIGFzc2V0cy9qcy9ncmVldC5qc1xubW9kdWxlLmV4cG9ydHMgPSBmdW5jdGlvbihuYW1lKSB7XG4gICAgcmV0dXJuIGBZbyB5byAke25hbWV9IC0gd2VsY29tZSB0byBFbmNvcmUhYDtcbn07Il0sInNvdXJjZVJvb3QiOiIifQ==