function showErrorAlert() {
    const alertContainer = document.createElement('DIV');
    alertContainer.classList.add('alert-container', 'in');

    const alert = document.createElement('DIV');
    alert.classList.add('alert', 'in', 'no-select');

    const x = document.createElement('SPAN');
    // x.textContent = 'X';

    const alertTitle = document.createElement('P');
    alertTitle.classList.add('alert-title');
    alertTitle.textContent = 'El archivo no se puede subir';

    const alertInfo = document.createElement('P');
    alertInfo.classList.add('alert-info');
    alertInfo.textContent = 'El formato debe ser PDF';

    const button = document.createElement('BUTTON');
    button.classList.add('button');
    button.textContent = 'Ok';
    button.addEventListener('click', () => {
        alert.classList.remove('in');
        alert.classList.add('out');

        alertContainer.classList.remove('in');
        alertContainer.classList.add('out');

        setTimeout(() => {
            alertContainer.remove();
            document.body.classList.remove('alert');
        }, 950);
    })

    alert.appendChild(x);
    alert.appendChild(alertTitle);
    alert.appendChild(alertInfo);
    alert.appendChild(button);

    alertContainer.appendChild(alert);
    alertContainer.addEventListener('click', function(e) {
        if(e.target === this) {

            alert.classList.remove('in');
            alert.classList.add('out');
    
            this.classList.remove('in');
            this.classList.add('out');
    
            setTimeout(() => {
                this.remove();
                document.body.classList.remove('alert');
            }, 950);
        }
    })

    document.body.classList.add('alert');
    document.body.appendChild(alertContainer);
}