(() => {
    const app = {
        init () {
            this.cacheElements();
            this.openUserNav(); 
            this.getSearchValue();
            this.getSelectedNav();
        },
        cacheElements () {
            this.$userIcon = document.querySelector('.user-img--header');
            this.$userOptions = document.querySelector('.user-options');

            this.$list = document.querySelector('.list');

            this.$navigations = document.querySelectorAll('.header__link--text');

            this.$userHeader = document.querySelector('.user-img--header');
            
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

        },
        getSelectedNav() {
            const location = window.location.href;

            this.$navigations.forEach(nav => {
                if (location.includes(nav.dataset.nav)) {
                    nav.classList.add('header__link--selected')
                } else {
                    nav.classList.remove('header__link--selected')
                }
            });

            if (location.includes('user')) {
                this.$userHeader.classList.add('user-img--selected')
            } else {
                this.$userHeader.classList.remove('user-img--selected')
            }
        }
    }
    app.init();
})(); 
