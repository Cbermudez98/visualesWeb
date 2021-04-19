let objRevision = [];
let o = "";
let aux = "";
const enviarRevision = () => {
    try {
        /*Necesito obtener
        consecutivowil, fechainicial, hora inicial, fechafinal, horafinal, placa, tipovehiculo, descripcion, resultado, operador,
        codigodefecto, tipo, grupo, observacion, nombre operador, id del operador, SimultBajaDX, SimultBajaSX, SimultAltaDX, SimultAltaSX, SimultAntinbDX, SimultaAntinSX, SimultExporDX, SimultExplorSX
    */
        console.log(objRevision);
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al enviar los datos de la revision " + error
        })
    }
}

const obtenerDataTablaDefectos = () => {
    try {
        const infoTabla = document.querySelectorAll('#tbodyDefectos tr');
        //debugger;
        let arre = [];
        let grupo;
        let descripcion;
        let tipo;
        let resultado;
        let codError;
        infoTabla.forEach(e => {
            grupo = e.getElementsByTagName('td')[0].getAttribute('value');
            descripcion = e.getElementsByTagName('td')[1].getAttribute('value');
            tipo = e.getElementsByTagName('td')[2].getAttribute('value');
            resultado = e.getElementsByTagName('td')[3].getAttribute('value');
            codError = e.getElementsByTagName('td')[4].getAttribute('value');
            o = "";
            o = { 'grupo': grupo, 'descripcion': descripcion, 'tipo': tipo, 'resultado': resultado, 'corError': codError };
            arre.push(o);
            o = "";
        })
        aux = arre;
        //console.log(aux);
        //console.log("Guardo_________________________-------------------------->");
        
        if(objRevision.length < 2){
            objRevision.push(aux);
        }
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al obtener la informacion de la tabla defectos " + error
        })
    }
}

const obtenerInfo = () => {
    try {
        const enviarData = document.getElementById('enviarRevision');
        enviarData.addEventListener('click', () => {
            const consecutivo = document.getElementById('consecutivo').innerHTML;
            const fechaInicio = document.getElementById('fecha').innerHTML;
            const horaInicio = document.getElementById('hora').innerHTML;
            const placa = document.getElementById('placa').innerHTML;
            const tipoVehiculo = document.getElementById('tipoVehiculo').innerHTML;
            
            //labrado izquierdo
            const laIzEj1 = document.getElementById('laIzEj1').value != 0 ? document.getElementById('laIzEj1').value : 0;
            const laIzEj2 = document.getElementById('laIzEj2').value != 0 ? document.getElementById('laIzEj2').value : 0;
            const laIzEj21 = document.getElementById('laIzEj21').value != 0 ? document.getElementById('laIzEj21').value : 0;
            const laIzEj3 = document.getElementById('laIzEj3').value != 0 ? document.getElementById('laIzEj3').value : 0;
            const laIzEj31 = document.getElementById('laIzEj31').value != 0 ? document.getElementById('laIzEj31').value : 0;
            const laIzEj4 = document.getElementById('laIzEj4').value != 0 ? document.getElementById('laIzEj4').value : 0;
            const laIzEj41 = document.getElementById('laIzEj41').value != 0 ? document.getElementById('laIzEj41').value : 0;
            const laIzEj5 = document.getElementById('laIzEj5').value != 0 ? document.getElementById('laIzEj5').value : 0;
            const laIzEj51 = document.getElementById('laIzEj51').value != 0 ? document.getElementById('laIzEj51').value : 0;
            const laIzRes = document.getElementById('laIzRes').value != 0 ? document.getElementById('laIzRes').value : 0;
            //labrado derecho
            const laDeEj1 = document.getElementById('laDeEj1').value != 0 ? document.getElementById('laDeEj1').value : 0;
            const laDeEj2 = document.getElementById('laDeEj2').value != 0 ? document.getElementById('laDeEj2').value : 0;
            const laDeEj21 = document.getElementById('laDeEj21').value != 0 ? document.getElementById('laDeEj21').value : 0;
            const laDeEj3 = document.getElementById('laDeEj3').value != 0 ? document.getElementById('laDeEj3').value : 0;
            const laDeEj31 = document.getElementById('laDeEj31').value != 0 ? document.getElementById('laDeEj31').value : 0;
            const laDeEj4 = document.getElementById('laDeEj4').value != 0 ? document.getElementById('laDeEj4').value : 0;
            const laDeEj41 = document.getElementById('laDeEj41').value != 0 ? document.getElementById('laDeEj41').value : 0;
            const laDeEj5 = document.getElementById('laDeEj5').value != 0 ? document.getElementById('laDeEj5').value : 0;
            const laDeEj51 = document.getElementById('laDeEj51').value != 0 ? document.getElementById('laDeEj51').value : 0;
            const laDeRes = document.getElementById('laDeRes').value != 0 ? document.getElementById('laDeRes').value : 0;
            //Presion Izquierda
            const PrIzEj1 = document.getElementById('PrIzEj1').value != 0 ? document.getElementById('PrIzEj1').value : 0;
            const PrIzEj2 = document.getElementById('PrIzEj2').value != 0 ? document.getElementById('PrIzEj2').value : 0;
            const PrIzEj21 = document.getElementById('PrIzEj21').value != 0 ? document.getElementById('PrIzEj21').value : 0;
            const PrIzEj3 = document.getElementById('PrIzEj3').value != 0 ? document.getElementById('PrIzEj3').value : 0;
            const PrIzEj31 = document.getElementById('PrIzEj31').value != 0 ? document.getElementById('PrIzEj31').value : 0;
            const PrIzEj4 = document.getElementById('PrIzEj4').value != 0 ? document.getElementById('PrIzEj4').value : 0;
            const PrIzEj41 = document.getElementById('PrIzEj41').value != 0 ? document.getElementById('PrIzEj41').value : 0;
            const PrIzEj5 = document.getElementById('PrIzEj5').value != 0 ? document.getElementById('PrIzEj5').value : 0;
            const PrIzEj51 = document.getElementById('PrIzEj51').value != 0 ? document.getElementById('PrIzEj51').value : 0;
            const PrIzRes = document.getElementById('PrIzRes').value != 0 ? document.getElementById('PrIzRes').value : 0;

            //Presion derecha
            const PrDeEj1 = document.getElementById('PrDeEj1').value != 0 ? document.getElementById('PrDeEj1').value : 0;
            const PrDeEj2 = document.getElementById('PrDeEj2').value != 0 ? document.getElementById('PrDeEj2').value : 0;
            const PrDeEj21 = document.getElementById('PrDeEj21').value != 0 ? document.getElementById('PrDeEj21').value : 0;
            const PrDeEj3 = document.getElementById('PrDeEj3').value != 0 ? document.getElementById('PrDeEj3').value : 0;
            const PrDeEj31 = document.getElementById('PrDeEj31').value != 0 ? document.getElementById('PrDeEj31').value : 0;
            const PrDeEj4 = document.getElementById('PrDeEj4').value != 0 ? document.getElementById('PrDeEj4').value : 0;
            const PrDeEj41 = document.getElementById('PrDeEj41').value != 0 ? document.getElementById('PrDeEj41').value : 0;
            const PrDeEj5 = document.getElementById('PrDeEj5').value != 0 ? document.getElementById('PrDeEj5').value : 0;
            const PrDeEj51 = document.getElementById('PrDeEj51').value != 0 ? document.getElementById('PrDeEj51').value : 0;
            const PrDeRes = document.getElementById('PrDeRes').value != 0 ? document.getElementById('PrDeRes').value : 0;
            //checkbox simultaneas
            const lBajaSimultDer = document.getElementById('lBajaSimultDer').checked != true ? "NO" : "SI";
            const lBajaSimultIzq = document.getElementById('lBajaSimultIzq').checked != true ? "NO" : "SI";
            const lAltaSimultDer = document.getElementById('lAltaSimultDer').checked != true ? "NO" : "SI";
            const lAltaSimultIzq = document.getElementById('lAltaSimultIzq').checked != true ? "NO" : "SI";
            const lAntiSimultDer = document.getElementById('lAntiSimultDer').checked != true ? "NO" : "SI";
            const lAntiSimultIzq = document.getElementById('lAntiSimultIzq').checked != true ? "NO" : "SI";
            //Observaciones
            const observaciones = document.getElementById('observaciones').value != "" ? document.getElementById('observaciones').value : "";
            const obj = {'laIzEj1':laIzEj1,'laIzEj2':laIzEj2,'laIzEj21':laIzEj21,'laIzEj3':laIzEj3,'laIzEj31':laIzEj31,'laIzEj4':laIzEj4,'laIzEj41':laIzEj41,'laIzEj5':laIzEj5,'laIzEj51':laIzEj51,'laIzRes':laIzRes,
            'laDeEj1':laDeEj1,'laDeEj2':laDeEj2,'laDeEj21':laDeEj21,'laDeEj3':laDeEj3,'laDeEj31':laDeEj31,'laDeEj4':laDeEj4,'laDeEj41':laDeEj41,'laDeEj5':laDeEj5,'laDeEj51':laDeEj51,'laDeRes':laDeRes,
            'PrIzEj1':PrIzEj1,'PrIzEj2':PrIzEj2,'PrIzEj21':PrIzEj21,'PrIzEj3':PrIzEj3,'PrIzEj31':PrIzEj31,'PrIzEj4':PrIzEj4,'PrIzEj41':PrIzEj41,'PrIzEj5':PrIzEj5,'PrIzEj51':PrIzEj51,'PrIzRes':PrIzRes,
            'PrDeEj1':PrDeEj1,'PrDeEj2':PrDeEj2,'PrDeEj21':PrDeEj21,'PrDeEj3':PrDeEj3,'PrDeEj31':PrDeEj31,'PrDeEj4':PrDeEj4,'PrDeEj41':PrDeEj41,'PrDeEj5':PrDeEj5,'PrDeEj51':PrDeEj51,'PrDeRes':PrDeRes,
            'lBajaSimultDer':lBajaSimultDer,'lBajaSimultIzq':lBajaSimultIzq,'lAltaSimultDer':lAltaSimultDer,'lAltaSimultIzq':lAltaSimultIzq,'lAntiSimultDer':lAntiSimultDer,'lAntiSimultIzq':lAntiSimultIzq}
            //console.log("Labrado izquierdo " + laIzEj1, laIzEj2, laIzEj21, laIzEj3, laIzEj31, laIzEj4, laIzEj41, laIzEj5, laIzEj51, laIzRes);
            //console.log("Labrado derecho " + laDeEj1, laDeEj2, laDeEj21, laDeEj3, laDeEj31, laDeEj4, laDeEj41, laDeEj5, laDeEj51, laDeRes);
            //console.log("Presion Izquierda " + PrIzEj1, PrIzEj2, PrIzEj21, PrIzEj3, PrIzEj31, PrIzEj4, PrIzEj41, PrIzEj5, PrIzEj51, PrIzRes);
            //console.log("presion Derecha " + PrDeEj1, PrDeEj2, PrDeEj21, PrDeEj3, PrDeEj31, PrDeEj4, PrDeEj41, PrDeEj5, PrDeEj51, PrDeRes);
            //console.log("Simultaneas " + lBajaSimultDer, lBajaSimultIzq, lAltaSimultDer, lAltaSimultIzq, lAntiSimultDer, lAntiSimultIzq);
            //console.log("Observaciones " + observaciones);
            //console.log(arre);
            if(objRevision < 2){
                objRevision.push(obj);
                enviarRevision();
            }
            obtenerDataTablaDefectos();
            
        })
        //arre = [];
        
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al guardar la informacion " + error
        })
    }
}
