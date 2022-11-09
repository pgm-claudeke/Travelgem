(() => {
    const app = {
        init() {
            this.cacheElements();
            this.getSearchedPosts();
        },
        cacheElements() {
            this.$searchInput = document.querySelector('#searchPostAdmin');
        },
        getSearchedPosts() {
            this.$searchInput.addEventListener('keyup', (e) => {
                var search_string = this.$searchInput.value
                console.log(search_string);

                fetch('api/admin/posts/' + search_string)
                .then((response) => response.text())
                .then((data) => {console.log(data);document.getElementById('listPostsAdmin').innerHTML = data})
            });
        }
    }
    app.init();
})();
