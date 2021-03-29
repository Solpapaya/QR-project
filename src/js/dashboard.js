let currentSection = 1;

function dashboard() {
    const sidebarButtons = document.querySelectorAll('.sidebar button');
    sidebarButtons.forEach(button => {
        button.addEventListener('click', changeSection)
    })    
}

function changeSection(e) {
    let newSection = e.currentTarget;
    if(newSection == currentSection) {
        return;
    }
    if(newSection.parentNode.previousElementSibling === null) {
        const uploadFileSection = document.querySelector('.sidebar-item-container button[data-section="1"]');
        newSection = uploadFileSection; 
    }
    clearSidebarClasses();
    newSection.parentNode.classList.add('selected');
    newSection.parentNode.previousElementSibling.classList.add('right-bottom-border');
    newSection.parentNode.nextElementSibling.classList.add('right-top-border');

    let sidebarPreviousElement = newSection.parentNode.previousElementSibling.previousElementSibling;

    while(sidebarPreviousElement !== null) {
        sidebarPreviousElement.classList.add('right-border');
        sidebarPreviousElement = sidebarPreviousElement.previousElementSibling;
    }

    let sidebarNextElement = newSection.parentNode.nextElementSibling.nextElementSibling;

    while(sidebarNextElement !== null) {
        sidebarNextElement.classList.add('right-border');
        sidebarNextElement = sidebarNextElement.nextElementSibling;
    }
}

function clearSidebarClasses() {
    const sidebarChildren = document.querySelectorAll('.sidebar > *');
    sidebarChildren.forEach(child => {
        child.classList.remove('right-border');
        child.classList.remove('right-top-border');
        child.classList.remove('right-bottom-border');
        child.classList.remove('selected');
    })
}