(() => {
    const app = {
        init () {
            this.cacheElements();
            this.openFilter();
        },
        cacheElements () {
            this.$filTerBtn = document.querySelector('.filter__btn');
            this.$filterForm = document.querySelector('.filter__form');
            this.$filterIconUp = document.querySelector('.filter__icon--up');
            this.$filterIconDown = document.querySelector('.filter__icon--down');
        },
        openFilter () {
            this.$filTerBtn.addEventListener('click', (e) => {
                if (this.$filterForm.classList.contains('filter__form--hide')) {
                    this.$filterForm.classList.remove('filter__form--hide');
                    this.$filterIconUp.classList.remove('filter__icon--hide');
                    this.$filterIconDown.classList.add('filter__icon--hide');
                } else {
                    this.$filterForm.classList.add('filter__form--hide');
                    this.$filterIconUp.classList.add('filter__icon--hide');
                    this.$filterIconDown.classList.remove('filter__icon--hide');
                }
            })
        }
    }
    app.init();
})(); 
