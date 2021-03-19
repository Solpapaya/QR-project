function selectAnimation() {
    const selectContainer = document.querySelector('.select-container');
    selectContainer.addEventListener('click', function(e) {
        e.preventDefault();
        if(e.target !== this) {
            const inputId = `#${e.target.getAttribute('for')}`;
            const input = document.querySelector(inputId);
            input.checked = true;
        }
        if(this.classList.contains('selected')) this.classList.remove('selected');
        else this.classList.add('selected');
    })
}