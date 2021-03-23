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
        inputSubmit.click();
    })

    inputContainer.appendChild(fileInput);
}
