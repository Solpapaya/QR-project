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
        if(this.files.length > 0) {
            const {boolean, errorInfo} = validateFile(this.files);
            if(boolean) {
                inputSubmit.click();
            } else {
                // Alert the user the file is not in PDF format
                showErrorAlert(errorInfo);
            }
        }
    })

    inputContainer.appendChild(fileInput);
}
