const requerirDatos = (tipoVehiculo) => {
    try {
        const dato = {'peticion':'llenarTablaDefecto','tipoVehiculo':tipoVehiculo}
        $.ajax({
            url: 'modelo/defectoModel.php',
            data: dato,
            type: 'POST',
            success: (res) => {
                console.log(res);
            }

        })
        console.log(tipoVehiculo);
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al requerir los datos de la tabla defectos " + error
        })
    }
}

const llenarModalHeader = (vehiculo) => {
    try {
        document.getElementById('consecutivo').innerText += vehiculo.consecutivowil;
        document.getElementById('fecha').innerText += vehiculo.fecha;
        document.getElementById('hora').innerText += vehiculo.hora;
        document.getElementById('placa').innerText += vehiculo.targa;
        document.getElementById('tipoVehiculo').innerText += vehiculo.clase;
        //modalheader.innerHTML = res;
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al formatear la informacion del modal"
        })
    }
}

const limpiarModal = () => {
    try {
        $('#modalDefectos').on('hidden.bs.modal', () => {
            document.getElementById('consecutivo').innerText = "";
            document.getElementById('fecha').innerText = "";
            document.getElementById('hora').innerText = "";
            document.getElementById('placa').innerText = "";
            document.getElementById('tipoVehiculo').innerText = "";
        })
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al limpiar la ventana modal "+error
        })
    }
}

const mostrarModal = () => {
    try {
        $('#modalDefectos').modal('show');
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "Error al mostrar la ventana " + error
        })
    }
}

const cargarTablaDefectos = (vehiculo) => {
    try {
        mostrarModal();
        limpiarModal();
        llenarModalHeader(vehiculo);
        requerirDatos(vehiculo.clase);
    } catch (error) {
        swal({
            icon: 'error',
            title: "Error",
            text: "al ejecutar dataRequest " + error
        })
    }
}
