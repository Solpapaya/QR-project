async function createLoadingAnimation() {
    const path = Snap(document.querySelector('.load'));
    const finalPath = "M 0,0 c 0,0 63.5,-16.5 80,0 16.5,16.5 0,60 0,60 L 0,60 Z";
    await showLoadingContainer();
    path.animate( { 'path' : finalPath }, 1000, mina.linear);

    const squareLoadingAnimation = document.querySelector('.loading-animation');
    squareLoadingAnimation.addEventListener('mouseover', function() {
        this.classList.add('show-error-message');
    })


    // const masterTimeline = gsap.timeline({defaults: {ease: "power1.out"}});
    // const infiniteRotation = gsap.timeline({repeat: -1, defaults: {ease: "power1.out"}});
    
    // masterTimeline.to('.loading-animation', {opacity: 1, transform: "rotateX(180deg)", duration: 0.5, delay: 0.7})
    // masterTimeline.add(infiniteRotation);

    // infiniteRotation.fromTo('.loading-animation', {transform: "rotateY(0deg)"}, {transform: "rotateY(180deg)", transformOrigin: "center", duration: 0.5})
    // infiniteRotation.fromTo('.loading-animation', {transform: "rotateX(0deg)"}, {transform: "rotateX(180deg)", duration: 0.5})

    // const squareLoadingAnimation = document.querySelector('.loading-animation');
    // squareLoadingAnimation.addEventListener('mouseover', () => {
    //     // infiniteRotation.set({clearProps: "transform"}) 
    //     infiniteRotation.progress(0).clear()
    //     masterTimeline.to('.loading-animation', {width: "20rem", duration: 3});
    // })
}

function showLoadingContainer() {
    const loadingContainer = document.querySelector('.loading-container');
    loadingContainer.classList.add('show');    
}

function deleteLoadingAnimation() {
    const path = Snap(document.querySelector('.load'));
    const startingPath = "M 0,0 c 0,0 -16.5,43.5 0,60 16.5,16.5 80,0 80,0 L 0,60 Z";
    path.animate( { 'path' : startingPath }, 1000, mina.linear);

    const loadingContainer = document.querySelector('.loading-container');
    loadingContainer.classList.add('hide');
    setTimeout(() => {
        loadingContainer.classList.remove('show');
        loadingContainer.classList.remove('hide');
    }, 1000);
}