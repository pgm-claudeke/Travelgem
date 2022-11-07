/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/explore.js ***!
  \*********************************/
(function () {
  var app = {
    init: function init() {
      this.cacheElements();
      this.openFilter();
      this.getSelectedTags();
    },
    cacheElements: function cacheElements() {
      this.$filTerBtn = document.querySelector('.filter__btn');
      this.$filterForm = document.querySelector('.filter__form');
      this.$filterIconUp = document.querySelector('.filter__icon--up');
      this.$filterIconDown = document.querySelector('.filter__icon--down');
      this.$checkboxesTags = document.querySelectorAll('.tag__checkbox');
    },
    openFilter: function openFilter() {
      var _this = this;

      this.$filTerBtn.addEventListener('click', function (e) {
        if (_this.$filterForm.classList.contains('filter__form--hide')) {
          _this.$filterForm.classList.remove('filter__form--hide');

          _this.$filterIconUp.classList.remove('filter__icon--hide');

          _this.$filterIconDown.classList.add('filter__icon--hide');
        } else {
          _this.$filterForm.classList.add('filter__form--hide');

          _this.$filterIconUp.classList.add('filter__icon--hide');

          _this.$filterIconDown.classList.remove('filter__icon--hide');
        }
      });
    },
    getSelectedTags: function getSelectedTags() {
      var selectedTags = [];
      this.$checkboxesTags.forEach(function (tag) {
        tag.addEventListener('change', function () {
          if (tag.checked) {
            selectedTags.push(tag.value);
          } else {
            var indexOfTag = selectedTags.indexOf(tag.value);
            selectedTags.splice(indexOfTag, 1);
          }

          fetch('api/home/' + selectedTags.join(',')).then(function (response) {
            return response.text();
          }).then(function (html) {
            document.getElementById('listExplore').innerHTML = html;
          });
        });
      });
      return selectedTags;
    }
  };
  app.init();
})();
/******/ })()
;