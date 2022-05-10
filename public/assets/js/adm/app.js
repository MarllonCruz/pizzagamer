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
}); // Search Post

$("#form-post-search").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  var load = $(".ajax_load");
  form.ajaxSubmit({
    url: form.attr("action"),
    type: "POST",
    dataType: "json",
    beforeSend: function beforeSend() {
      load.fadeIn(200).css("display", "flex");
    },
    success: function success(response) {
      //redirect
      if (response.redirect) {
        window.location.href = response.redirect;
      } else {
        load.fadeOut(200);
      }
    },
    error: function error(response) {
      load.fadeOut(200);
    }
  });
}); // TinyMCE INIT

tinyMCE.init({
  selector: "textarea.mce",
  language: 'pt_BR',
  menubar: false,
  theme: "modern",
  height: 132,
  skin: 'light',
  entity_encoding: "raw",
  theme_advanced_resizing: true,
  plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor media"],
  toolbar: "styleselect | pastetext | removeformat |  bold | italic | underline | strikethrough | bullist | numlist | alignleft | aligncenter | alignright |  link | unlink | fsphpimage | code | fullscreen",
  style_formats: [{
    title: 'Normal',
    block: 'p'
  }, {
    title: 'Titulo 1',
    block: 'h2'
  }, {
    title: 'Titulo 2',
    block: 'h3'
  }, {
    title: 'Titulo 3',
    block: 'h4'
  }, {
    title: 'Titulo 4',
    block: 'h5'
  }, {
    title: 'Código',
    block: 'pre',
    classes: 'brush: php;'
  }],
  link_class_list: [{
    title: 'None',
    value: ''
  }, {
    title: 'Blue CTA',
    value: 'btn btn_cta_blue'
  }, {
    title: 'Green CTA',
    value: 'btn btn_cta_green'
  }, {
    title: 'Yellow CTA',
    value: 'btn btn_cta_yellow'
  }, {
    title: 'Red CTA',
    value: 'btn btn_cta_red'
  }],
  setup: function setup(editor) {
    editor.addButton('fsphpimage', {
      title: 'Enviar Imagem',
      icon: 'image',
      onclick: function onclick() {
        $('.mce_upload').fadeIn(200, function (e) {
          $("body").click(function (e) {
            if ($(e.target).attr("class") === "mce_upload") {
              $('.mce_upload').fadeOut(200);
            }
          });
        }).css("display", "flex");
      }
    });
  },
  link_title: false,
  target_list: false,
  theme_advanced_blockformats: "h1,h2,h3,h4,h5,p,pre",
  media_dimensions: false,
  media_poster: false,
  media_alt_source: false,
  media_embed: false,
  extended_valid_elements: "a[href|target=_blank|rel|class]",
  imagemanager_insert_template: '<img src="{$url}" title="{$title}" alt="{$title}" />',
  image_dimensions: false,
  relative_urls: false,
  remove_script_host: false,
  paste_as_text: true
}); // Action Upload Image TinyMCE

$(".app_form").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  var load = $(".ajax_load");

  if (typeof tinyMCE !== 'undefined') {
    tinyMCE.triggerSave();
  }

  form.ajaxSubmit({
    url: form.attr("action"),
    type: "POST",
    dataType: "json",
    beforeSend: function beforeSend() {
      $(".mce_response").html('');
      load.fadeIn(200).css("display", "flex");
    },
    success: function success(response) {
      //image by fsphp mce upload
      if (response.mce_image) {
        $('.mce_upload').fadeOut(200);
        tinyMCE.activeEditor.insertContent(response.mce_image);
        form.find("input[type='file']").val(null);
        load.fadeOut(200);
      }
    },
    complete: function complete() {
      if (form.data("reset") === true) {
        form.trigger("reset");
      }
    },
    error: function error(response) {
      if (response.responseJSON.errors) {
        $(".mce_response").html('Arquivo foi invalido').effect("bounce");
        load.fadeOut(200);
      }
    }
  });
});
/******/ })()
;