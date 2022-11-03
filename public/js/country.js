/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/country.js ***!
  \*********************************/
(function () {
  var app = {
    init: function init() {
      this.cacheElements();
      this.openSelectFilter();
    },
    cacheElements: function cacheElements() {
      this.$btnSelect = document.querySelector('.select-city');
      this.$dropDownSelect = document.querySelector('.filter__drop-down');
    },
    openSelectFilter: function openSelectFilter() {
      var _this = this;

      this.$btnSelect.addEventListener('click', function (e) {
        if (_this.$dropDownSelect.classList.contains('filter__drop-down--hide')) {
          _this.$dropDownSelect.classList.remove('filter__drop-down--hide');
        } else {
          _this.$dropDownSelect.classList.add('filter__drop-down--hide');
        }
      });
    }
  };
  app.init();
})();
/******/ })()
;