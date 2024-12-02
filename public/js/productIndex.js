let carrito = [];

function mostrarModal(id, nombre, precio, presentation, specifications, description, stock, imagenUrl) {
    const modal = document.getElementById('modalProducto');
    modal.style.display = 'block';

    // Almacenar el id del producto en el modal para su uso posterior
    modal.dataset.id = id;

    const specification = specifications.replace(/<br\s*[\/]?>/gi, '\n'); 
    const descrip = description.replace(/<br\s*[\/]?>/gi, '\n'); 
    const specificationWithLineBreaks = specification.split('\\n').join('\n');
    const descriptionWithLineBreaks = descrip.split('\\n').join('\n');
    
    // Configurar el contenido del modal
    document.getElementById('modalNombre').innerText = nombre || 'Producto sin nombre';
    document.getElementById('valueDescription').innerText = descriptionWithLineBreaks || 'Sin descripción';
    document.getElementById('valueSpecification').innerText = specificationWithLineBreaks || 'Sin especificaciones';
    document.getElementById('modalPrecio').innerText = precio || '0';
    document.getElementById('valueStock').innerText = stock || '0';
    document.getElementById('modalDescripcion').innerText = presentation || 'Sin presentación';
    document.getElementById('modalImagen').src = imagenUrl || 'ruta/de/imagen/por/defecto.png';  // Agrega una ruta de imagen por defecto si no hay imagen
    document.getElementById('valueStock').innerText = stock || 'Sin stock';

    const editarBtn = document.getElementById('editarBtn');
    const eliminarBtn = document.getElementById('eliminarBtn');
    
    editarBtn.href = editRouteBase.replace(':id', id);
    eliminarBtn.onclick = function() { 
        confirmDelete(id); 
    };
}

function confirmarEliminar(id) {
    const res = window.confirm('¿Seguro que quiere eliminar el producto?');
    if (res) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = deleteRouteBase.replace(':id', id);
        form.innerHTML = `
            <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
            <input type="hidden" name="_method" value="DELETE">
        `;
        document.body.appendChild(form);
        form.submit();
    } else {
        return false;
    }
}

function cerrarModal() {
    document.getElementById('modalProducto').style.display = 'none';
}

function agregarAlCarrito() {
    const modal = document.getElementById('modalProducto');
    const id_producto = modal.dataset.id;
    const nombre = document.getElementById('modalNombre').innerText;
    const precio = parseFloat(document.getElementById('modalPrecio').innerText) || 0;
    const cantidad = parseInt(document.getElementById('cantidadProducto').value) || 0;

    if (cantidad > 0) { // Solo agrega si la cantidad es válida
        carrito.push({ id_producto, nombre, precio, cantidad });
        actualizarCarrito();
    } else {
        alert("Por favor, ingrese una cantidad válida.");
    }
    cerrarModal();
}

function actualizarCarrito() {
    const carritoContenido = document.getElementById('carrito-contenido');
    carritoContenido.innerHTML = ''; // Limpiar el contenido previo

    let totalSuma = 0;
    let totalProductos = 0;

    carrito.forEach(item => {
        totalProductos += item.cantidad;
        const itemTotal = item.precio * item.cantidad;
        totalSuma += itemTotal;

        const productoInfo = document.createElement('div');
        productoInfo.innerHTML = `<p><strong>${item.nombre}</strong><span>  </span><span>  </span>${item.precio} Bs </p>`;
        productoInfo.dataset.id = item.id_producto; // Asegúrate de que el id_producto está siendo utilizado correctamente
        carritoContenido.appendChild(productoInfo);
    });

    document.getElementById('total-productos').innerText = `${totalProductos}`; 
    document.getElementById('total-suma').innerText = `${totalSuma} Bs`;
    // Mostrar el botón de pagar si hay productos en el carrito
    const pagarBtn = document.getElementById('pagar-btn');
    if (totalProductos > 0) {
        pagarBtn.style.display = 'inline-block';
    } else {
        pagarBtn.style.display = 'none';
    }
}

function pagar() {
    const totalSuma = parseFloat(document.getElementById('total-suma').innerText) || 0;
    const fecha = new Date().toISOString().slice(0, 19).replace('T', ' '); // Formato de fecha y hora MySQL

    if (totalSuma > 0) {
        const data = {
            total: totalSuma,
            fecha: fecha,
            detalles: carrito.map(item => ({
                id_producto: item.id_producto,
                nombre: item.nombre,
                precio: item.precio,
                cantidad: item.cantidad
            }))
        };

        fetch('/pagar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Pago registrado correctamente');
                // Aquí podrías vaciar el carrito si lo deseas
                carrito = [];
                actualizarCarrito();
                // Redirigir al usuario
                window.location.href = data.redirect;
            } else {
                alert('Hubo un error al registrar el pago: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un error al registrar el pago');
        });
    } else {
        alert('No hay productos en el carrito');
    }
}
