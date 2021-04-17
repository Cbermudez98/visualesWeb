const requerirDatos = (vehiculo) => {
    try {
        const dato = {'peticion':'llenarTablaDefecto','tipoVehiculo':vehiculo.clase,'fecha':vehiculo.fecha,'placa':vehiculo.targa};
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
            text: "al formatear la informacion del modal " +error
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
            document.getElementById('observaciones').value = "";
            if(document.getElementById('lBajaSimultDer').checked){
                document.getElementById('lBajaSimultDer').checked = false;
            }
            //Limpiar checkbox
            if(document.getElementById('lBajaSimultIzq').checked){
                document.getElementById('lBajaSimultIzq').checked = false;
            }

            if(document.getElementById('lAltaSimultDer').checked){
                document.getElementById('lAltaSimultDer').checked = false;
            }

            if(document.getElementById('lAltaSimultIzq').checked){
                document.getElementById('lAltaSimultIzq').checked = false;
            }

            if(document.getElementById('lAntiSimultDer').checked){
                document.getElementById('lAntiSimultDer').checked = false;
            }

            if(document.getElementById('lAntiSimultIzq').checked){
                document.getElementById('lAntiSimultIzq').checked = false;
            }

            //Limpiar tabla labrado Izquierdo
            document.getElementById('laIzEj1').value = "";
            document.getElementById('laIzEj2').value = "";
            document.getElementById('laIzEj21').value = "";
            document.getElementById('laIzEj3').value = "";
            document.getElementById('laIzEj31').value = "";
            document.getElementById('laIzEj4').value = "";
            document.getElementById('laIzEj41').value = "";
            document.getElementById('laIzEj5').value = "";
            document.getElementById('laIzEj51').value = "";
            document.getElementById('laIzRes').value = "";

            //Limpiar Tabla labrado Derecho
            document.getElementById('laDeEj1').value = "";
            document.getElementById('laDeEj2').value = "";
            document.getElementById('laDeEj21').value = "";
            document.getElementById('laDeEj3').value = "";
            document.getElementById('laDeEj31').value = "";
            document.getElementById('laDeEj4').value = "";
            document.getElementById('laDeEj41').value = "";
            document.getElementById('laDeEj5').value = "";
            document.getElementById('laDeEj51').value = "";
            document.getElementById('laDeRes').value = "";

            //Limpiar tabla presion Izquierda
            document.getElementById('PrIzEj1').value = "";
            document.getElementById('PrIzEj2').value = "";
            document.getElementById('PrIzEj21').value = "";
            document.getElementById('PrIzEj3').value = "";
            document.getElementById('PrIzEj31').value = "";
            document.getElementById('PrIzEj4').value = "";
            document.getElementById('PrIzEj41').value = "";
            document.getElementById('PrIzEj5').value = "";
            document.getElementById('PrIzEj51').value = "";
            document.getElementById('PrIzRes').value = "";

            //Limpiar tabla presion Derecha
            document.getElementById('PrDeEj1').value = "";
            document.getElementById('PrDeEj2').value = "";
            document.getElementById('PrDeEj21').value = "";
            document.getElementById('PrDeEj3').value = "";
            document.getElementById('PrDeEj31').value = "";
            document.getElementById('PrDeEj4').value = "";
            document.getElementById('PrDeEj41').value = "";
            document.getElementById('PrDeEj5').value = "";
            document.getElementById('PrDeEj51').value = "";
            document.getElementById('PrDeRes').value = "";
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
                cambiarColorFilaDefectos(index);
                break;
            
            case "NA":
                celda.innerHTML = "R";
                //cambiarColorFilaDefectos(index);
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
        llenarModalHeader(vehiculo);
        requerirDatos(vehiculo);
        //alert(JSON.stringify(vehiculo))
        limpiarModal();
        limpiarTablaModal();
    } catch (error) {
        swal({
            icon: 'error',
            title: "Error",
            text: "al ejecutar dataRequest " + error
        })
    }
}
