// Paroles rādīšana
document.addEventListener('DOMContentLoaded', function () {
    const passwordButtons = document.querySelectorAll('.password-container button');

    passwordButtons.forEach(button => {
        button.addEventListener('click', function () {
            const input = this.previousElementSibling;
            const isPassword = input.type === 'password';

            input.type = isPassword ? 'text' : 'password';

            const img = this.querySelector('img');
            img.src = isPassword 
                ? "/icons/visible-off-w-32.svg"
                : "/icons/visible-w-32.svg";
        });
    });
});