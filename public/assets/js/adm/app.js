/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/adm/app.js ***!
  \*********************************/
$(function () {
  // Menu 
  var aside = $('#menu-aside');
  $('#btn-menu').on('click', function () {
    aside.addClass('active');
    aside.one('mouseleave', function () {
      aside.removeClass('active');
    });
  });
});
/******/ })()
;