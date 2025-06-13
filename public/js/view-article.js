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

document.addEventListener('DOMContentLoaded', function () {
    // Lietotāja pārvirzīšana uz reģistrācijas logu
    const registerButton = document.getElementById('register-button');
    const emailInput = document.getElementById('email');

    if (registerButton && emailInput) {
        registerButton.addEventListener('click', function () {
            const email = emailInput.value.trim();
            window.location.href = `../register?email=${encodeURIComponent(email)}`;
        });
    } 
    else {
        return;
    }
});