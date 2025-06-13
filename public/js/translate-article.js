// Teksta ievades loga izmēra automātiska palielināšana
const contentTextarea = document.getElementById('content');
const contentTextarea2 = document.getElementById('content2');

function resizeTextarea() {
    contentTextarea.style.height = 'auto';
    contentTextarea.style.height = contentTextarea.scrollHeight + 'px';

    contentTextarea2.style.height = 'auto';
    contentTextarea2.style.height = contentTextarea2.scrollHeight + 'px';
}

resizeTextarea();

contentTextarea2.addEventListener('input', resizeTextarea);