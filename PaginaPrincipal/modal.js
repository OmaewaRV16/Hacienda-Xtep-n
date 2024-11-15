// Función para abrir el modal y cargar los detalles de la promoción
function openModal(promocionId, nombrePromocion, menu, invitados) {
    console.log("openModal llamada con los siguientes parámetros:", promocionId, nombrePromocion, menu, invitados); // Muestra los parámetros en la consola

    fetch(`obtener_detalles.php?id=${promocionId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.json();  // Asegúrate de que el servidor devuelva JSON
        })
        .then(data => {
            console.log("Datos recibidos del servidor:", data); // Muestra la respuesta de fetch

            if (data.error) {
                alert(data.error);  // Si hay un error, lo muestra en un alert
                return;
            }

            // Muestra la imagen si existe, si no, oculta el contenedor de la imagen
            if (data.imagen) {
                const imageUrl = 'login/' + data.imagen;  // Ajusta la ruta según corresponda
                document.getElementById('modal-image').src = imageUrl;
                document.getElementById('modal-image').style.display = 'block';
            } else {
                document.getElementById('modal-image').style.display = 'none';
            }

            // Asigna los valores al formulario oculto
            document.getElementById('evento').value = nombrePromocion;
            document.getElementById('menu_banquete').value = menu;
            document.getElementById('invitados').value = invitados;

            // Muestra el modal
            document.getElementById('myModal').style.display = 'block';
        })
        .catch(error => {
            console.error('Error al obtener los detalles:', error);  // Muestra cualquier error en la consola
            alert('Hubo un error al obtener los detalles de la promoción.');
        });
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById('myModal').style.display = 'none';
}

// Función para redirigir al formulario de reservas con los valores seleccionados
function reservar() {
    const evento = document.getElementById('evento').value;
    const menuBanquete = document.getElementById('menu_banquete').value;
    const invitados = document.getElementById('invitados').value;

    // Verificar si los valores están completos antes de proceder
    if (!evento || !menuBanquete || !invitados) {
        alert("Por favor, selecciona todos los campos antes de reservar.");
        return; // Evita redirigir si hay campos vacíos
    }

    // Redirigir al formulario con los parámetros en la URL
    window.location.href = `alta_reservas_eventos.php?evento=${encodeURIComponent(evento)}&menu_banquete=${encodeURIComponent(menuBanquete)}&invitados=${encodeURIComponent(invitados)}`;
}
