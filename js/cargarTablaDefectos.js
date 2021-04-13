const requerirDatos = (tipoVehiculo) => {
    try {
        const dato = {'peticion':'llenarTablaDefecto','tipoVehiculo':tipoVehiculo}
        $.ajax({
            url: 'modelo/defectoModel.php',
            data: dato,
            type: 'POST',
            success: (res) => {
               if(res.type == "error"){
                   swal({
                       icon: "error",
                       title: "Error",
                       text: res.mensaje
                   })
               } else {
                   llenarTablaModal(res);
               }
            }

        })
        //console.log(tipoVehiculo);
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

const llenarTablaModal = (x) => {
    try {
        //Recibe un arreglo de objetos se debe iterar para mostrar en la tabla
        let tr = JSON.parse(x);
        const tbodyD = document.getElementById('tbodyDefectos');
        const res = tr.map(r => '<tr><td scope="col">'+r.grupo+'</td><td scope="col">'+r.descripcion+'</td><td scope="col">'+r.tipo+'</td><td scope="col">R</td><td scope="col">'+r.codError+'</td></tr>');
        //console.log(JSON.stringify(res));
        tbodyD.innerHTML = res.join("");
        modificarResultado();

    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al llenar la tabla en el modal "+error
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

const limpiarTablaModal = () => {
    try {
        $('#modalDefectos').on('hidden.bs.modal', () => {
            document.getElementById('tbodyDefectos').innerHTML = "";
        })
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al limpiar la tabla modal"
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

const cambiarColorFilaDefectos = (index) => {
    try {
        const color = document.querySelectorAll("#tbodyDefectos tr");
        color[index].classList.toggle("text-danger");
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al modificar el color de la fila "+error
        })
    }
}

const modificarValorResultado = (index) => {
    let celdaT;
    try {
        const listaDefecto = document.getElementById('tbodyDefectos');
        const fila = listaDefecto.getElementsByTagName("tr")[index];
        const celda = fila.getElementsByTagName('td')[3];
        celdaT = celda.innerHTML;
        
        switch (celdaT) {
            case "R":
                celda.innerHTML = "I";
                cambiarColorFilaDefectos(index);
                break;
            
            case "I":
                celda.innerHTML = "NA";
                break;
            
            case "NA":
                celda.innerHTML = "R";
                cambiarColorFilaDefectos(index);
            default:
                break;
        }

        
        
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al modificar el valor del resultado "+error
        })
    }
}

const modificarResultado = () => {
    try {
        const filasDefectos = document.querySelectorAll('#tbodyDefectos tr');
        
        filasDefectos.forEach((fd,i) => {
            fd.addEventListener('click',()=>{
                modificarValorResultado(i);
            });
        });
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al modificar el resultado "+error
        })
    }
}

const cargarTablaDefectos = (vehiculo) => {
    try {
        mostrarModal();
        limpiarModal();
        llenarModalHeader(vehiculo);
        requerirDatos(vehiculo.clase);
        limpiarTablaModal();
    } catch (error) {
        swal({
            icon: 'error',
            title: "Error",
            text: "al ejecutar dataRequest " + error
        })
    }
}
