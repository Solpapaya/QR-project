function resetFileInput() {
    const inputContainer = document.querySelector('.upload-input-container');

    const inputSubmit = document.querySelector('input[type=submit]');

    const fileInput = document.createElement('INPUT');
    fileInput.type = "file";
    fileInput.name = "fileToUpload";
    fileInput.accept = ".pdf";
    fileInput.id = "fileToUpload";
    fileInput.addEventListener('change', function() {
        // this.form.submit();
        if(validateFile(this.files[0])) {
            inputSubmit.click();
        } else {
            // Alert the user the file is not in PDF format
            console.log("Your file must be PDF format");
        }
    })

    inputContainer.appendChild(fileInput);
}
