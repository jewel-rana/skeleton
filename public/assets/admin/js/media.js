/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./Modules/Media/Resources/assets/js/media.js":
/*!****************************************************!*\
  !*** ./Modules/Media/Resources/assets/js/media.js ***!
  \****************************************************/
/***/ (function() {

var _this = this;

jQuery(function ($) {
  "use strict";

  var modal = $('#mediaUploadModal');
  var elam = $('.mediaModal');
  $(elam).click(function () {
    alert($(_this));
  });
});
/**
 * Ajax Submit v0.1.4
 * http://github.com/bogdan/ajaxsubmit
 *
 * Copyright 2011-2012, Bogdan Gusiev
 * Released under the MIT License
 */
// Generated by CoffeeScript 1.6.3

(function () {
  (function ($) {
    var applyValidation, applyValidationMessage;
    $.errors = {
      attribute: "validate",
      activationClass: "validation-active",
      format: "<div class='validation-block'><div class='validation-message'></div></div>",
      messageClass: "validation-message"
    };

    applyValidationMessage = function applyValidationMessage(div, message) {
      var message_div;

      if (!div.hasClass($.errors.activationClass)) {
        div.addClass($.errors.activationClass);
        message_div = div.find("." + $.errors.messageClass);

        if (message_div.size() === 0) {
          div.append($.errors.format);
        }

        message_div = div.find("." + $.errors.messageClass);

        if (message_div.size() > 0) {
          return message_div.html(message);
        } else {
          throw new Error("configuration error: $.errors.format must have elment with class " + $.errors.messageClass);
        }
      }
    };

    applyValidation = function applyValidation(form, field, message) {
      var div;
      div = form.find("[" + $.errors.attribute + "~='" + field + "']");

      if (div.size() === 0) {
        div = $("<div " + $.errors.attribute + "='" + field + "'>" + ("Unassigned error: Add validate=\"" + field + "\" attribute somewhere in a form.</div>"));
        form.prepend(div);
      }

      return applyValidationMessage(div, message);
    };

    $.fn.applyErrors = function (errors) {
      $(this).clearErrors();
      return $(this).addErrors(errors);
    };

    $.fn.addErrors = function (errors) {
      var form, old_errors;
      form = $(this);

      if ($.type(errors) === "object") {
        old_errors = errors;
        errors = [];
        $.each(old_errors, function (key, value) {
          if (value && !($.isArray(value) && value.length === 0)) {
            return errors.push([key, value]);
          }
        });
      }

      return $(errors).each(function (key, error) {
        var field, message;
        field = error[0];
        message = error[1];

        if ($.isArray(message)) {
          message = message[0];
        }

        return applyValidation(form, field, message);
      });
    };

    return $.fn.clearErrors = function () {
      var validators;
      validators = $(this).find("[" + $.errors.attribute + "]");
      validators.find("." + $.errors.messageClass).html("");
      return validators.removeClass($.errors.activationClass);
    };
  })(jQuery);
}).call(this); // Generated by CoffeeScript 1.6.3

(function () {
  (function ($) {
    var ajaxFormErrorHandler, ajaxFormSuccessHandler;

    $.fn.ajaxSubmit = function (options) {
      var $form, callback, data, error_callback, method, url;

      if (options == null) {
        options = {};
      }

      $form = $(this);
      $form.clearErrors();

      if (typeof options === "function") {
        options.success = options;
      }

      if (options.redirect && !options.success) {
        options.success = function () {
          return window.location = options.redirect;
        };
      }

      callback = options.success;
      error_callback = options.error;
      http_error_callback = options.http_error;
      method = $form.attr("method") || "get";
      url = $form.attr("action");
      data = $form.serialize();

      if (!jQuery.isEmptyObject(options.data)) {
        data = data + "&" + $.param(options.data);
      }

      return $.ajax({
        type: options.type || method,
        url: options.url || url,
        data: data,
        dataType: "json",
        success: function success(data) {
          return ajaxFormSuccessHandler($form, data, callback, error_callback);
        },
        error: function error(xhr, status, str) {
          return ajaxFormErrorHandler($form, xhr, http_error_callback);
        }
      });
    };

    ajaxFormSuccessHandler = function ajaxFormSuccessHandler($form, data, callback, error_callback) {
      if ($.isEmptyObject(data && data.errors)) {
        if (typeof callback === "function") {
          return callback.call($form[0], data);
        } else if (data.redirect) {
          return window.location = data.redirect;
        }
      } else {
        if (typeof error_callback === "function") {
          error_callback.call($form, data);
        }

        return $form.applyErrors(data.errors);
      }
    };

    ajaxFormErrorHandler = function ajaxFormErrorHandler($form, xhr, http_error_callback) {
      if (xhr.responseJSON.errors) {
        return $form.applyErrors(xhr.responseJSON.errors);
      }

      if (typeof http_error_callback == "function") {
        http_error_callback.call($form[0], xhr);
      }
    };

    return $.fn.ajaxForm = function (options) {
      if (options == null) {
        options = {};
      }

      return $(this).bind("submit", function (event) {
        event.preventDefault();
        return $(this).ajaxSubmit(options);
      });
    };
  })(jQuery);
}).call(this);

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./Modules/Media/Resources/assets/js/media.js"]();
/******/ 	
/******/ })()
;