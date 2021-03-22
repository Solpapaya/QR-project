function resetFileInput() {
    const inputContainer = document.querySelector('.upload-input-container');

    const fileInput = document.createElement('INPUT');
    fileInput.type = "file";
    fileInput.name = "fileToUpload";
    fileInput.accept = ".pdf";
    fileInput.id = "fileToUpload";
    fileInput.addEventListener('change', function() {
        this.form.submit();
        this.remove();
    })

    inputContainer.appendChild(fileInput);
}
