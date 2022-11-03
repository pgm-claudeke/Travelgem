(() => {
    const app = {
        init () {
            this.cacheElements();
            this.openUserNav(); 
        },
        cacheElements () {
            this.$userIcon = document.querySelector('.navigation__user');
            this.$userOptions = document.querySelector('.user-options');
        },
        openUserNav () {
            this.$userIcon.addEventListener('click', (e) => {
                if (this.$userOptions.classList.contains('user-options--hide')) {
                    this.$userOptions.classList.remove('user-options--hide')
                } else {
                    this.$userOptions.classList.add('user-options--hide')
                }
            });
        }
    }
    app.init();
})(); 
