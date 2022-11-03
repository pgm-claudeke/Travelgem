(() => {
    const app = {
        init () {
            this.cacheElements();
            this.editableTag();
        },
        cacheElements () {
            this.$editTagBtn = document.querySelectorAll('.btn__edit-tag');
        },
        editableTag () {
            this.$editTagBtn.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = e.target.dataset.id;

                    console.log(id)

                    this.tagName = document.querySelector(`.table__tag-${id}`);
                    this.tagName.classList.add('tag-hide')

                    this.editBtnRemove = document.querySelector(`.btn__edit-tag-${id}`);
                    this.editBtnRemove.classList.add('tag-hide')

                    this.deleteBtn = document.querySelector(`.table__btn--delete-tag-${id}`)
                    this.deleteBtn.classList.add('tag-hide')

                    this.editFormTag = document.querySelector(`.edit-tag-${id}`);
                    this.editFormTag.classList.remove('tag-hide')

                    this.tagNames = document.querySelectorAll('.table__tag-name');
                    console.log(this.tagNames);
                })
            });
        }
    }
    app.init();
})(); 
