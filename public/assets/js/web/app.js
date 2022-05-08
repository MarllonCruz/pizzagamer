/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/web/app.js ***!
  \*********************************/
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

/* =======================================================
*   Btn Nav Menu
* ======================================================= */
var menuBtnOpen = document.querySelector('.nav-menu--btn-open');
var menuBtnClose = document.querySelector('.nav-menu--btn-close');
var menus = document.querySelector('.nav-menu--menus');
var menuOpen = false;
menuBtnOpen.addEventListener('click', function () {
  if (!menuOpen) {
    menus.classList.add('active');
    menuOpen = true;
  } else {
    menus.classList.remove('active');
    menuOpen = false;
  }
});
menuBtnClose.addEventListener('click', function () {
  if (menuOpen) {
    menus.classList.remove('active');
    menuOpen = false;
  }
});
/* =======================================================
*   Javascript sliders
* ======================================================= */

var slides = document.querySelectorAll('.slide');
var btns = document.querySelectorAll('.btn');
var currentSlide = 1; // slider manual navigation

var manualNav = function manualNav(manual) {
  slides.forEach(function (slide) {
    slide.classList.remove('active');
  });
  btns.forEach(function (btn) {
    btn.classList.remove('active');
  });
  slides[manual].classList.add('active');
  btns[manual].classList.add('active');
};

btns.forEach(function (btn, i) {
  btn.addEventListener('click', function () {
    manualNav(i);
    currentSlide = i;
  });
}); // slider autoplay navigation

var repeat = function repeat(activeClass) {
  var active = document.getElementsByClassName('slide active');
  var i = 1;

  var repeater = function repeater() {
    setTimeout(function () {
      _toConsumableArray(active).forEach(function (activeSlide) {
        activeSlide.classList.remove('active');
      });

      btns.forEach(function (btn) {
        btn.classList.remove('active');
      });
      slides[i].classList.add('active');
      btns[i].classList.add('active');
      i++;

      if (slides.length == i) {
        i = 0;
      }

      if (i >= slides.length) {
        return;
      }

      repeater();
    }, 10000);
  };

  repeater();
};

repeat();
/* =======================================================
*   Modal Open Video
* ======================================================= */

$("[data-modal]").click(function (e) {
  e.preventDefault();
  var iframe = $(".embed iframe");
  var modal = $(this).data("modal");
  var uri = $(this).data("uri");
  iframe.attr('src', uri);
  $(modal).fadeIn(200).css("display", "flex");
});
/* =======================================================
*   Modal Close Video
* ======================================================= */

$(".j_modal_close").click(function (e) {
  e.preventDefault();

  if ($(e.target).hasClass("j_modal_close")) {
    $(".j_modal_close").fadeOut(200);
  }

  var iframe = $(this).find("iframe");

  if (iframe) {
    iframe.attr("src", null);
  }
});
/******/ })()
;