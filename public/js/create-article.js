document.addEventListener('DOMContentLoaded', function () {
    // Augšupielādētā sīkattēla + attēla faila nosaukuma attēlošana
    document.getElementById('thumbnail').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('thumbnail-preview');
        previewContainer.innerHTML = '';

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                previewContainer.appendChild(img);

                const fileNameElement = document.createElement('p');
                fileNameElement.id = 'file-name';
                fileNameElement.classList.add('transparent');
                fileNameElement.textContent = file.name
                previewContainer.appendChild(fileNameElement);
            };
            reader.readAsDataURL(file);
        }
    });

    // Pogas piesaistīšana faila ievades logam
    document.getElementById('custom-thumbnail-button').addEventListener('click', function () {
        document.getElementById('thumbnail').click();
    });

    // Textarea lauka automātiskā izmēra maiņa
    const contentTextarea = document.getElementById('content');
    contentTextarea.style.height = '124px';

    contentTextarea.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });
});