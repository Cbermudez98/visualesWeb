let arr = {};
let vehiculoSelect = {};

const render = () => {
    try {
        const tabla = document.getElementById('tbody');
        const peticion = { "peticion": "llenarTabla" };
        $.ajax({
            url: "modelo/revisionModel.php",
            data: peticion,
            type: "POST",
            success: ((res) => {

                arr = JSON.parse(res);
                //let tr = document.createElement('tr');
                let tr = '';
                arr.forEach((i, cont) => {
                    tr += '<tr><th scope="row">' + cont + '</th>';
                    tr += '<td>' + i.fecha + '</td>';
                    tr += '<td>' + i.hora + '</td>';
                    tr += '<td>' + i.consecutivowil + '</td>';
                    tr += '<td>' + i.targa + '</td>';
                    tr += '<td>' + i.clase + '</td>';
                    tr += '<td><button class="btn btn-primary btn-sm">Seleccionar</button></td></tr>';
                    tabla.innerHTML = tr;
                    //console.log(td);
                });
                selectRow();
                //console.log(arr[0].clase)
            })
        })
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "Something went wrong"
        })
    }
}

const selectRow = () => {
    try {
        const filas = document.querySelectorAll('#tbody tr');

        filas.forEach((f, i) => {
            f.addEventListener('click', () => {
                vehiculoSelect = arr[i];
                cargarTablaDefectos(vehiculoSelect);
            });
        });
    } catch (error) {
        swal({
            icon: 'error',
            title: 'Error',
            text: "Error al ejecutar selectRow "+error
        })
    }
}
/* Pirmero se lista, luego se selecciona el automovil con el cual se quiere trabajar,
tiene que salir una ventana modal con todos los elementos que se tienen que seleccionar,
para seleccionar y luego guardar....

Luego de todo eso se tiene que volver a llamar a la funcion listar para que traiga los datos*/
window.onload = () => {
    render();
}