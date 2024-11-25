document.addEventListener('DOMContentLoaded', function() {
    const imageUrlInput = document.getElementById('imageUrlInput');
    const currentImage = document.getElementById('currentImage');
    const imageFileName = document.getElementById('imageFileName');

    // Mostrar la imagen actual si existe
    if (currentImage.src) {
        currentImage.style.display = 'block';
    }

    // Mostrar el nombre del archivo de imagen si existe
    if (imageFileName.textContent) {
        imageFileName.style.display = 'block';
    }

    // Ocultar la imagen actual o nombre del archivo al seleccionar una nueva imagen
    imageUrlInput.addEventListener('change', function() {
        if (imageUrlInput.files.length > 0) {
            currentImage.style.display = 'none';
            imageFileName.style.display = 'none';
        }
    });
});