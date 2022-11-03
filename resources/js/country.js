(() => {
    const app = {
        init () {
            this.cacheElements();
            this.openSelectFilter();
        },
        cacheElements () {
            this.$btnSelect = document.querySelector('.select-city');
            this.$dropDownSelect = document.querySelector('.filter__drop-down');
        },
        openSelectFilter () {
            this.$btnSelect.addEventListener('click', (e) => {
                if (this.$dropDownSelect.classList.contains('filter__drop-down--hide')) {
                    this.$dropDownSelect.classList.remove('filter__drop-down--hide');
                } else {
                    this.$dropDownSelect.classList.add('filter__drop-down--hide');
                }
            })
        }
    }
    app.init();
})(); 
