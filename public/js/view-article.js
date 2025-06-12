// Saites kopēšana
document.addEventListener('DOMContentLoaded', function () {
    const copyLinkButton = document.getElementById('copy-link-button');

    copyLinkButton.addEventListener('click', function () {
        const currentUrl = window.location.href;

        navigator.clipboard.writeText(currentUrl).then(function () {
            console.log('Link copied to clipboard');
        }).catch(function (error) {
            console.error('Failed to copy link: ', error);
        });
    });
});

// Lietotāja pārvirzīšana uz reģistrācijas logu
document.addEventListener('DOMContentLoaded', function () {
    const registerButton = document.getElementById('register-button');
    const emailInput = document.getElementById('email');

    registerButton.addEventListener('click', function () {
        const email = emailInput.value.trim(); // Get the email value
        window.location.href = `../register?email=${encodeURIComponent(email)}`;
    });
});