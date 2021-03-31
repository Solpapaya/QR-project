function createLoadingAnimation() {
    const loadingContainer = document.querySelector('.loading-container');
    loadingContainer.classList.add('show');

    // const loadingSquare = document.querySelector('.loading-animation');

    // loadingSquare.addEventListener('mouseover', function(e) {
    //     this.classList.add('show-error-message');
    //     this.firstElementChild.classList.add('show-text-message');
    //     // this.classList.add('show-success-message');
    //     // setTimeout(() => {
    //     //     this.textContent = "Hello";
    //     // }, 1000)
    // })
}

function deleteLoadingAnimation() {
    const loadingContainer = document.querySelector('.loading-container');
    loadingContainer.classList.add('hide');
    setTimeout(() => {
        loadingContainer.classList.remove('show');
        loadingContainer.classList.remove('hide');
    }, 1000);
}