/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/adm/login.js ***!
  \***********************************/
$(function () {
  $("form").submit(function (e) {
    e.preventDefault();
    var form = $(this);
    var load = $(".ajax_load");
    load.fadeIn(200).css("display", "flex");
    $.ajax({
      url: form.attr("action"),
      type: "POST",
      data: form.serialize(),
      dataType: "json",
      success: function success(response) {
        //redirect
        if (response.redirect) {
          window.location.href = response.redirect;
        } else {
          load.fadeOut(200);
        } //Error


        if (response.message) {
          $(".ajax_response").html(response.message).effect("bounce");
        }
      },
      // Error
      error: function error(response) {
        $.each(response.responseJSON.errors, function () {
          $(".ajax_response").html(this[0]).effect("bounce");
          return false;
        });
        load.fadeOut(200);
      }
    });
  });
});
/******/ })()
;