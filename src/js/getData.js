async function getData() {
    createLoading();
    await fetchData();
    deleteLoading();
}

function deleteLoading() {
    const loadingContainer = document.querySelector('.loading-container');
    loadingContainer.remove();
}

function createLoading() {
    const loadingContainer = document.createElement('DIV');
    loadingContainer.classList.add('loading-container');

    const loading = document.createElement('DIV');
    loading.classList.add('loading');

    const animation = document.createElement('DIV');
    animation.classList.add('lds-ring');

    for(let i = 0; i < 4; i++) {
        const div = document.createElement('DIV');
        animation.appendChild(div);
    }

    loading.appendChild(animation);
    loadingContainer.appendChild(loading);

    document.body.appendChild(loadingContainer);
}

async function fetchData() {
    const form = new FormData(document.querySelector(".form"));
    try {
        const url = 'http://localhost/SocialService/QR-project/includes/monthsPerson.php';
        const result = await fetch(url, {
            method: "post",
            body: form
        });

        const data = await result.json();
        const {rfc} = data;
        // console.log(rfc);
        console.log(data);
        // return rfc;
    }catch(e) {
        console.log(e);
    }
}