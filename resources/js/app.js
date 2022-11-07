(() => {
    const app = {
        init () {
            this.cacheElements();
            this.openUserNav(); 
            this.getSearchValue();
        },
        cacheElements () {
            this.$userIcon = document.querySelector('.navigation__user');
            this.$userOptions = document.querySelector('.user-options');

            this.$list = document.querySelector('.list');
        },
        openUserNav () {
            this.$userIcon.addEventListener('click', (e) => {
                if (this.$userOptions.classList.contains('user-options--hide')) {
                    this.$userOptions.classList.remove('user-options--hide')
                } else {
                    this.$userOptions.classList.add('user-options--hide')
                }
            });
        },
        getSearchValue () {

        }
    }
    app.init();
})(); 
