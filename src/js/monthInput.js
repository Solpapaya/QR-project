function monthInput() {
    const selectInput = document.querySelector('.select-input');
    selectInput.addEventListener('click', function(e) {
        if(!this.classList.contains('selected')) {
            this.classList.add('selected');
        }else {
            this.classList.remove('selected');
        }
    })

    const monthContainer = document.querySelector('.month-container');
    monthContainer.addEventListener('click', function(e) {
        e.preventDefault();
        const month = e.target.getAttribute('for');
        updateMonth(month);
        const inputRadio = document.querySelector(`#${month}`);
        inputRadio.checked = true;
        selectInput.classList.remove('selected'); 
    })
}

function updateMonth(month) {
    const selectInput = document.querySelector('.select-input');
    selectInput.textContent = month;
}