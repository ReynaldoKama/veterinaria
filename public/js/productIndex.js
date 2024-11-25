let carrito = [];

    function mostrarModal(id, nombre, precio, presentation, specifications, description, stock, imagenUrl) {
        const modal = document.getElementById('modalProducto');
        modal.style.display = 'block';

        const specification = specifications.replace(/<br\s*[\/]?>/gi, '\n'); 
        const descrip = description.replace(/<br\s*[\/]?>/gi, '\n'); 
        // Separar la cadena por \n y unirse con saltos de línea 
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
    
    function confirmDelete(id) {
        var res = window.confirm('Seguro que quiere eliminar el producto');
        if (res) {
            let form = document.createElement('form');
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
        const nombre = document.getElementById('modalNombre').innerText;
        const precio = parseFloat(document.getElementById('modalPrecio').innerText) || 0;
        const cantidad = parseInt(document.getElementById('cantidadProducto').value) || 0;

        if (cantidad > 0) { // Solo agrega si la cantidad es válida
            carrito.push({ nombre, precio, cantidad });
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
        let totalProductos=0;

        carrito.forEach(item => {
            totalProductos+= item.cantidad
            const itemTotal = item.precio * item.cantidad;
            totalSuma += itemTotal;

            const productoInfo = document.createElement('div');
            productoInfo.innerHTML = `<p><strong>${item.nombre}</strong><span>  </span><span>  </span>${item.precio} Bs </p>`;
            carritoContenido.appendChild(productoInfo);
        });
        document.getElementById('total-productos').innerText =`${totalProductos}`; 
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
        alert('Proceso de pago iniciado');
    }