/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(3);


/***/ }),
/* 1 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__helpers__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__helpers___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__helpers__);


jQuery(document).ready(function ($) {

    if ($('body').hasClass('page-template-front-page')) {
        $('img[usemap]').rwdImageMaps();

        // var img = $('.field-image');

        // function state_change(data) {
        //     //alert(data.state+":"+data.selected);
        // }
        // img.mapster({
        //     noHrefIsMask: false,
        //     onStateChange: state_change,
        //     fillColor: '0a7a0a',
        //     fillOpacity: 0.7,
        //     mapKey: "group",
        //     strokeWidth: 2,
        //     stroke: true,
        //     strokeColor: 'F88017',
        //     // staticState: true,
        //     scaleMap: true,
        //     render_select: {
        //         fillColor: 'adadad',
        //         fillOpacity: 0.5
        //     },
        //     clickNavigate: true,
        //     areas: [
        //         {
        //             includeKeys: 'speakers-corner,comedy-tent,fairground,bar',
        //             stroke: true,
        //             scaleMap: true,
        //         },
        //     ]
        // });

        // jQuery(window).resize(function () {
        //     var windowWidth = $(window).width();
        //     // scale the image on resize with new coordinates
        //     img.mapster('resize', windowWidth, null, null);
        // })
    }
});

/***/ }),
/* 2 */
/***/ (function(module, exports) {

(function ($) {
  // $("#cookie").click(function () {
  //   $("#cookie-bar").fadeOut()

  //   var nDays = 999
  //   var cookieName = "disclaimer"
  //   var cookieValue = "true"

  //   var today = new Date()
  //   var expire = new Date()
  //   expire.setTime(today.getTime() + 3600000 * 24 * nDays)
  //   document.cookie =
  //     cookieName +
  //     "=" +
  //     escape(cookieValue) +
  //     ";expires=" +
  //     expire.toGMTString() +
  //     ";path=/"
  // })
})(jQuery);

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);
//# sourceMappingURL=app.js.map