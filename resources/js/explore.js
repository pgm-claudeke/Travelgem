(() => {
    const app = {
        init () {
            this.cacheElements();
            this.openFilter();
            this.getSelectedTags();
        },
        cacheElements () {
            this.$filTerBtn = document.querySelector('.filter__btn');
            this.$filterForm = document.querySelector('.filter__form');
            this.$filterIconUp = document.querySelector('.filter__icon--up');
            this.$filterIconDown = document.querySelector('.filter__icon--down');

            this.$checkboxesTags = document.querySelectorAll('.tag__checkbox');
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
        },
        getSelectedTags () {
            const selectedTags = []; 

            this.$checkboxesTags.forEach(tag => {
                tag.addEventListener('change', function(){
                    if (tag.checked ) {
                        selectedTags.push(tag.value)
                    } else {
                        const indexOfTag = selectedTags.indexOf(tag.value);
                        selectedTags.splice(indexOfTag, 1)
                    }

                    fetch('api/home/' + selectedTags.join(','))
                    .then((response) => response.text())
                    .then((html) => {document.getElementById('listExplore').innerHTML = html})
                    
                });
            });

            return selectedTags; 
        }
    }
    app.init(); 
})(); 
