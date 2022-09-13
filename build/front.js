/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/index.js":
/*!*************************!*\
  !*** ./src/js/index.js ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _views_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./views.js */ "./src/js/views.js");
/* harmony import */ var _views_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_views_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _views_loader_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./views-loader.js */ "./src/js/views-loader.js");
/* harmony import */ var _views_loader_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_views_loader_js__WEBPACK_IMPORTED_MODULE_1__);
// import './react/index.js';



/***/ }),

/***/ "./src/js/views-loader.js":
/*!********************************!*\
  !*** ./src/js/views-loader.js ***!
  \********************************/
/***/ (() => {

jQuery.fn.extend({
  viewTriggerLoaded: function () {
    let triggerChildren = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
    this.each(function () {
      const _view = jQuery(this);

      const viewName = _view.data("view");

      if (typeof viewName !== 'undefined' && viewName) {
        jQuery(document.body).triggerHandler("view_loaded_" + viewName, [_view]);

        if (triggerChildren) {
          _view.find(".view").viewTriggerLoaded();
        }
      } // _view.on("unload", function(){
      //     jQuery(this).triggerHandler("view_unloaded_" + viewName, [_view]);
      // });

    });
  },
  viewReplace: function (html) {
    let triggerLoadedEvent = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
    let triggerChildren = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;
    this.html(html);

    const _view = this.children();

    this.replaceWith(_view);

    if (triggerLoadedEvent) {
      _view.viewTriggerLoaded(triggerChildren);
    }
  },
  viewExists: function () {
    return jQuery.contains(document.body, this.get(0));
  }
});
jQuery(function ($) {
  /*
  * Trigger views loaded event
  * ----------------------------------------
  */
  $(".view").viewTriggerLoaded();
});

/***/ }),

/***/ "./src/js/views.js":
/*!*************************!*\
  !*** ./src/js/views.js ***!
  \*************************/
/***/ (() => {

jQuery(function ($) {
  /*
  * Helpers
  * --------------------------------------------------
  */
  function getWindowHeight(subElems) {
    let sh = 0;

    if (typeof subElems !== 'undefined') {
      subElems.each(function () {
        sh += $(this).outerHeight();
      });
    }

    return $(window).height() - sh;
  }

  ;

  function isMobile() {
    return $(window).width() < 992;
  }

  ;

  function showFormStatus(form, resp) {
    if (typeof resp.error_fields !== "undefined") {
      resp.error_fields.map(errorField => {
        const errorInput = form.find("[name='" + errorField + "']");
        errorInput.addClass("error");
        errorInput.on("change", function () {
          $(this).removeClass("error");
        });
      });
    }

    const messagesCont = form.find(".messages-cont");

    if (typeof resp.messages !== "undefined" && messagesCont.length) {
      messagesCont.html(resp.messages);
    }
  }
  /*
  * Standard ajax form
  * --------------------------------------------------
  */


  $(document.body).on("submit", "form.ajax-form-std", function (e) {
    e.preventDefault();
    const form = $(this);
    const btnSubmit = form.find("button[type='submit']");
    btnSubmit.prop("disabled", true);
    $.post(tbootIndexVars.ajaxurl, form.serialize(), function (resp) {
      // console.log(resp);
      if (resp.status) {
        if (resp.redirect) {
          location.assign(resp.redirect);
        } else if (resp.reload) {
          location.reload();
        }

        form.get(0).reset();
      }

      btnSubmit.prop("disabled", false);
      showFormStatus(form, resp);
    });
  });
  /*
  * .view.header
  * --------------------------------------------------
  */

  $(document.body).on("view_loaded_header", function (e, view) {
    function setSticky() {
      const scrollTop = $(window).scrollTop();

      if (scrollTop > view.height()) {
        if (!view.hasClass("sticky")) {
          view.addClass("sticky");
          setTimeout(function () {
            view.addClass("sticky-d");
          }, 500);
          $(document.body).css("padding-top", view.outerHeight() + "px");
        }
      } else if (scrollTop === 0 && view.hasClass("sticky")) {
        view.removeClass("sticky");
        view.removeClass("sticky-d");
        $(document.body).css("padding-top", 0);
      }
    }

    setSticky();
    $(window).on("scroll", function (event) {
      setSticky();
    });
    $(window).on("resize", function (event) {
      setSticky();
    });
    view.find(".nav-toggle-btn").on("click", function () {
      view.toggleClass("nav-opened");
    });
    view.find(".navs-mob-cont .nav-close-area").on("click", function () {
      view.removeClass("nav-opened");
    });
    view.find(".navs-mob-cont li.menu-item-has-children").on("click", function () {
      $(this).toggleClass("submenu-opened");
    });
    view.find(".navs-mob-cont li.menu-item-has-children > a").on("click", function (ev) {
      ev.preventDefault();
    });
  });
});

/***/ }),

/***/ "./src/scss/front.scss":
/*!*****************************!*\
  !*** ./src/scss/front.scss ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!****************************!*\
  !*** ./src/index-front.js ***!
  \****************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scss_front_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scss/front.scss */ "./src/scss/front.scss");
/* harmony import */ var _js_index_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/index.js */ "./src/js/index.js");


})();

/******/ })()
;
//# sourceMappingURL=front.js.map