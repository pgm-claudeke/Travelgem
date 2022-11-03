/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/dataTags.js ***!
  \**********************************/
(function () {
  var app = {
    init: function init() {
      this.cacheElements();
      this.editableTag();
    },
    cacheElements: function cacheElements() {
      this.$editTagBtn = document.querySelectorAll('.btn__edit-tag');
    },
    editableTag: function editableTag() {
      var _this = this;

      this.$editTagBtn.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
          var id = e.target.dataset.id;
          console.log(id);
          _this.tagName = document.querySelector(".table__tag-".concat(id));

          _this.tagName.classList.add('tag-hide');

          _this.editBtnRemove = document.querySelector(".btn__edit-tag-".concat(id));

          _this.editBtnRemove.classList.add('tag-hide');

          _this.deleteBtn = document.querySelector(".table__btn--delete-tag-".concat(id));

          _this.deleteBtn.classList.add('tag-hide');

          _this.editFormTag = document.querySelector(".edit-tag-".concat(id));

          _this.editFormTag.classList.remove('tag-hide');

          _this.tagNames = document.querySelectorAll('.table__tag-name');
          console.log(_this.tagNames);
        });
      });
    }
  };
  app.init();
})();
/******/ })()
;