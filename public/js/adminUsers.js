/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/adminUsers.js ***!
  \************************************/
(function () {
  var app = {
    init: function init() {
      this.cacheElements();
      this.getSearchedPosts();
    },
    cacheElements: function cacheElements() {
      this.$searchInput = document.querySelector('#searchUsersAdmin');
    },
    getSearchedPosts: function getSearchedPosts() {
      var _this = this;

      this.$searchInput.addEventListener('keyup', function (e) {
        var search_string = _this.$searchInput.value;
        console.log(search_string);
        fetch('/api/admin/' + search_string).then(function (response) {
          return response.text();
        }).then(function (data) {
          console.log(data);
          document.getElementById('listUsersAdmin').innerHTML = data;
        });
      });
    }
  };
  app.init();
})();
/******/ })()
;