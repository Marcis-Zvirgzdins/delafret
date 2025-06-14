document.addEventListener('DOMContentLoaded', function () {
    // Pogas piesaistīšana faila ievadei
    const uploadButton = document.getElementById('upload-profile-btn');
    const fileInput = document.getElementById('profile-pic-input');

    if (uploadButton && fileInput) {
        uploadButton.addEventListener('click', function () {
            fileInput.click();
        });

        // Profila bildes atjaunošana
        fileInput.addEventListener('change', function () {
            if (this.files.length > 0) {
                document.getElementById('upload-profile-form').submit();
            }
        });
    }
});