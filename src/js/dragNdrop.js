function dragNdrop() {
    const dropArea = document.querySelector('.upload-section');
    let isOver = false;
    
    dropArea.addEventListener('dragover', function(e) {
        // Stopping default prevents opening a new browser tab for showing the file that has been dropped
        e.preventDefault();
        isOver = true;
        highlight(this);
    });

    dropArea.addEventListener('dragleave', function(e) {
        isOver = false;
        /* Waits 10ms for checking whether the mouse is over the dropArea or not
        Because if you move into a child of the 'upload-container' DIV it will
        count as if you have left the dropArea and eventually it will 
        produce a 'dragleave' event even though you are still moving inside the
        dropArea. So that's why it waits 10ms because if the mouse is still moving
        inside the dropArea, it will create a 'dragover' 7ms or less after the dragleave
        event was fired. And that's how we know whether the mouse has left the dropArea 
        or not */
        setTimeout(() => {
            if(!isOver) {
                unhighlight(this);
            }
        }, 10);
    });

    dropArea.addEventListener('drop', function(e) {
        /* Stopping default prevents opening a new browser tab for showing the file that has been dropped
        Both are necessary, for 'drop' and 'dragover' events */
        e.preventDefault();
        unhighlight(this);
        handleDrop(e);
    });

    document.body.addEventListener('dragover', function(e) {
        e.preventDefault();
    })

    document.body.addEventListener('drop', function(e) {
        e.preventDefault();
    })
}

function handleDrop(e) {
    // Takes the file that has been dropped
    const dt = e.dataTransfer;
    const files = dt.files;

    if(validateFile(files[0])) {
        // Decode the QR code and retrieve the Date from the PDF Tax Receipt
        const inputFile = document.querySelector('input[type=file]');
        inputFile.files = files;
    
        const inputSubmit = document.querySelector('input[type=submit]');
        inputSubmit.click();
    }else {
        // Alert the user the file is not in PDF format
        console.log("Your file must be PDF format");
    }
}

function highlight(dropArea) {
    dropArea.classList.add('highlight');
}

function unhighlight(dropArea) {
    dropArea.classList.remove('highlight');
}

function validateFile(file) {
    if(file.type === 'application/pdf')  {
        return true;       
    } else {
        return false;
    }
}