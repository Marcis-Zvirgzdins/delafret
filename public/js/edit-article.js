// Teksta ievades loga izmēra automātiska palielināšana
const contentTextarea = document.getElementById('content');

function resizeTextarea() {
    contentTextarea.style.height = 'auto';
    contentTextarea.style.height = contentTextarea.scrollHeight + 'px'; // Adjust height
}
resizeTextarea();
contentTextarea.addEventListener('input', resizeTextarea);