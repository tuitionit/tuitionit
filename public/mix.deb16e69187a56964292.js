/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/laravel-mix/src/mock-entry.js":
/***/ function(module, exports) {



/***/ },

/***/ "./resources/assets/sass/backend/app.scss":
/***/ function(module, exports) {

throw new Error("Module parse failed: /home/saranga/php/tuitionix/resources/assets/sass/backend/app.scss Unexpected character '@' (1:0)\nYou may need an appropriate loader to handle this file type.\n| @import \"variable-overrides\";\n| @import \"~bootstrap-sass/assets/stylesheets/bootstrap\";\n| @import \"~font-awesome/scss/font-awesome\";");

/***/ },

/***/ "./resources/assets/sass/frontend/app.scss":
/***/ function(module, exports) {

throw new Error("Module parse failed: /home/saranga/php/tuitionix/resources/assets/sass/frontend/app.scss Unexpected character '@' (2:0)\nYou may need an appropriate loader to handle this file type.\n| // Fonts\n| @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);\n| \n| // Variables");

/***/ },

/***/ 2:
/***/ function(module, exports, __webpack_require__) {

__webpack_require__("./node_modules/laravel-mix/src/mock-entry.js");
__webpack_require__("./resources/assets/sass/frontend/app.scss");
module.exports = __webpack_require__("./resources/assets/sass/backend/app.scss");


/***/ }

/******/ });