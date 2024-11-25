document.addEventListener('DOMContentLoaded', function() {
    const fondoElement = document.querySelector('.contenido-principal');
    const imagenes = ['/images/fondo-1.jpg', '/images/vet-dog.jpg', '/images/Clinica-veterinaria.jpg']; // Array con las URLs de las imágenes de fondo
    let index = 0;

    setInterval(function() {
        index = (index + 1) % imagenes.length; // Alternar el índice de la imagen
        fondoElement.style.backgroundImage = `url(${imagenes[index]})`;
    }, 5000); // Cambiar cada 5 segundos (5000 ms)
});