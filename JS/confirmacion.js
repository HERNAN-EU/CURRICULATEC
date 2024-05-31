function confirmacion(evento) {
    // Preguntar al usuario si desea eliminar el registro
    var confirmacion = confirm("¿Deseas realizar modificaciones a este registro?");
    // Si el usuario confirma
    if (confirmacion==true) {
        // Preguntar al usuario su nombre
        var contraseña = prompt("Por favor, introduce la contraseña:");
        // Si la contraseña es correcta
        if (contraseña !== null && contraseña == "ADMIN") {
            return true;
        } else {
            evento.preventDefault();
            alert("No se proporcionó la contraseña o es incorrecta. Acción cancelada.");
        }
    } else {
        evento.preventDefault();
        alert("Acción cancelada.");
    }
    }
    let linkDelete = document.querySelectorAll(".btn-eliminar");
    for (let i = 0; i < linkDelete.length; i++) {
        linkDelete[i].addEventListener('click', confirmacion);
    }
    