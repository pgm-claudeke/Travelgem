/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/adminPosts.js ***!
  \************************************/
(function () {
  var app = {
    init: function init() {
      this.cacheElements();
      this.getSearchedPosts();
    },
    cacheElements: function cacheElements() {
      this.$searchInput = document.querySelector('#searchPostAdmin');
    },
    getSearchedPosts: function getSearchedPosts() {
      var _this = this;

      this.$searchInput.addEventListener('keyup', function (e) {
        var search_string = _this.$searchInput.value;
        console.log(search_string);
        fetch('api/admin/posts/' + search_string).then(function (response) {
          return response.text();
        }).then(function (data) {
          document.getElementById('listPostsAdmin').innerHTML = data;
          console.log(data);
        });
      });
    }
  };
  app.init();
})();
/******/ })()
;